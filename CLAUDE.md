# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What This Is

A custom WordPress theme ("John Mark") for a developer portfolio. It uses **Advanced Custom Fields (Free)** and **Custom Post Types** — no page builder, no block editor for content; everything is PHP templates + ACF field data + Tailwind CSS (CDN).

## Local Development

This theme runs inside **LocalWP (Local by Flywheel)**. There is no build step — no npm, no webpack, no compilation. To develop:

1. Open LocalWP and start the `jm-acf-portfolio` site.
2. Edit PHP/CSS/JS files directly — changes are reflected on page reload.
3. WordPress admin: open via LocalWP → WP Admin button.

After changes that affect Custom Post Types or taxonomies (i.e. `inc/custom-post-types.php`), go to **Settings → Permalinks → Save Changes** in WP Admin to flush rewrite rules.

## Architecture

### Styling approach
Tailwind CSS is loaded from CDN in `header.php` — there is no PostCSS build. The `assets/css/main.css` stylesheet handles legacy scroll-reveal animations and some base styles (originally dark theme from v1). Most newer UI in `front-page.php` and `single-work.php` uses inline Tailwind classes directly. The accent color is `#7C3AED` (purple).

### Template hierarchy
- `front-page.php` — Homepage (set via Settings → Reading). Contains hero, featured works (top 3 by menu_order), skills grid with JS tab filter, and core tech carousel.
- `single-work.php` — Individual work/project detail page.
- `archive-work.php`, `archive-skill.php`, `archive-certificate.php` — Archive pages for each CPT.
- `templates/page-contact.php`, `templates/page-about.php` — Page templates assigned in the editor.
- `template-parts/card-skill.php`, `card-work.php`, `card-certificate.php` — Reusable card partials.
- `header.php` — Loads Tailwind CDN, Font Awesome CDN, Plus Jakarta Sans font, and the sticky nav.
- `footer.php` + `inc/enqueue.php` — Load `assets/css/main.css` and `assets/js/main.js`.

### Custom Post Types (`inc/custom-post-types.php`)
Three CPTs registered via `devportfolio_register_post_types()`:
- `work` (slug: `/works/`) — portfolio projects, supports title/editor/thumbnail/excerpt
- `skill` (slug: `/skills/`) — individual skills, supports title/thumbnail
- `certificate` (slug: `/certificates/`) — certifications, supports title/thumbnail

Two taxonomies: `work_category` (hierarchical) and `skill_category` (hierarchical).

### ACF Fields (`acf-json/`)
JSON files are auto-synced by ACF. The `_updated` variants are the active versions:
- `group_homepage_updated.json` — Front page fields: `hero_greeting`, `hero_name`, `hero_tagline`, `hero_status_message`, `hero_description`, `hero_image`, `hero_cta_text`, `hero_cta_link`, `hero_resume_label`, `hero_resume_link`, `social_github`, `social_email`, `social_share_url`, `works_section_subtitle`, `skills_section_subtitle`, `skill_categories` (comma-separated), `core_technologies` (repeater: `name` + `icon`)
- `group_work_updated.json` — Work fields: `work_featured_image`, `work_tags` (textarea, one per line), `work_short_description`, `work_highlights` (repeater: `highlight`), `work_image_gallery` (repeater: `image`), `work_client`, `work_date`, `work_url`, `work_github_url`, `work_technologies` (textarea, one per line)
- `group_skill_updated.json` — Skill fields: `skill_icon` (Font Awesome class string), `skill_proficiency`, `skill_percentage`, `skill_description`, `skill_category` (text, used for JS filtering)
- `group_certificate_updated.json`, `group_about.json`, `group_contact.json` — other page fields

### Helper functions (`inc/helpers.php`)
- `devportfolio_parse_lines($value)` — splits textarea ACF field into array (one item per line); used for `work_tags` and `work_technologies`
- `devportfolio_get_work_gallery($post_id)` — legacy helper for old individual gallery fields (`work_gallery_1/2/3`); newer code uses `work_image_gallery` repeater directly
- `devportfolio_proficiency_color($level)` — returns CSS class for proficiency level
- `devportfolio_excerpt($limit)` — character-limited excerpt

### JavaScript (`assets/js/main.js`)
Vanilla JS on `DOMContentLoaded`:
- Mobile nav toggle (`#nav-toggle` / `#site-nav`)
- Sticky header scroll class on `#site-header`
- Scroll-reveal via `IntersectionObserver` on `.work-card`, `.skill-card`, `.cert-card`, etc.
- Skill bar width animation via `IntersectionObserver` on `.skill-card__fill[data-percent]`
- Works filter buttons (`.filter-btn[data-filter]`) — client-side show/hide by `.work-card__category` text

The front page's skill tab filter is inline `<script>` in `front-page.php` via `filterSkills()` — distinct from the archive filter.

## ACF JSON Sync

Editing field groups in WP Admin updates the files in `acf-json/`. Always commit these JSON files alongside any PHP changes that reference new field names. The `_updated` suffix files are the current active ones; the originals without suffix are older and superseded.

## Key Constraints

- **Free ACF only** — no Repeater field available in original design, so `work_technologies` and `work_tags` are textareas (one item per line). The newer `_updated` JSON files use repeaters (ACF Free supports repeaters in newer versions — double-check plugin version if fields don't appear).
- **No build pipeline** — do not add npm scripts or compiled assets without updating this file.
- **Tailwind via CDN** — all Tailwind classes are JIT-interpreted in the browser; arbitrary values like `text-[#7C3AED]` work fine.
- The `updated-front-page/index.php` file is a scratch/draft file, not part of the active template hierarchy.
