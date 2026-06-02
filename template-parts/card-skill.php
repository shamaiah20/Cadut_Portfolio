<?php
/**
 * Template Part: Skill Card
 * Updated to use Font Awesome icons and new ACF fields.
 */

$icon        = get_field('skill_icon'); // Font Awesome class
$level       = get_field('skill_proficiency') ?: 'intermediate';
$percentage  = get_field('skill_percentage') ?: 50;
$description = get_field('skill_description');
?>

<div class="bg-card-dark p-8 rounded-[32px] border border-border-dark shadow-sm hover:shadow-xl hover:shadow-accent/5 transition-all group h-full flex flex-col">
    <div class="flex items-center gap-4 mb-6">
        <div class="w-12 h-12 bg-accent/10 rounded-2xl flex items-center justify-center text-accent text-xl group-hover:bg-accent group-hover:text-bg-dark transition-colors flex-shrink-0">
            <i class="<?php echo esc_attr($icon ?: 'fa-solid fa-code'); ?>"></i>
        </div>
        <div>
            <h3 class="text-lg font-bold text-white leading-tight"><?php the_title(); ?></h3>
            <span class="text-[10px] font-black text-accent uppercase tracking-widest"><?php echo esc_html($level); ?></span>
        </div>
    </div>

    <?php if($description): ?>
    <div class="mb-6 flex-grow">
        <p class="text-zinc-400 text-sm font-medium leading-relaxed line-clamp-3">
            <?php echo esc_html($description); ?>
        </p>
    </div>
    <?php endif; ?>

    <div class="space-y-2 mt-auto">
        <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-widest text-zinc-500">
            <span>Proficiency</span>
            <span><?php echo esc_html($percentage); ?>%</span>
        </div>
        <div class="h-1.5 w-full bg-zinc-950 rounded-full overflow-hidden">
            <div class="h-full bg-accent rounded-full transition-all duration-1000" style="width: <?php echo esc_attr($percentage); ?>%"></div>
        </div>
    </div>
</div>
