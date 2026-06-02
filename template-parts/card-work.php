<?php
/**
 * Template Part: Work Card
 *
 * @package DevPortfolio
 */

$technologies = devportfolio_parse_lines( get_field( 'work_technologies' ) );
$categories   = get_the_terms( get_the_ID(), 'work_category' );
?>

<article class="work-card bg-card-dark border border-border-dark rounded-3xl overflow-hidden hover:border-accent/40 transition duration-300 flex flex-col group">
    <a href="<?php the_permalink(); ?>" class="work-card__link block">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="work-card__image relative overflow-hidden aspect-[16/10] bg-zinc-950">
                <?php the_post_thumbnail( 'portfolio-thumb', array('class' => 'w-full h-full object-cover group-hover:scale-[1.02] transition duration-700') ); ?>
                <div class="work-card__overlay absolute inset-0 bg-gradient-to-t from-bg-dark via-bg-dark/10 to-transparent opacity-80">
                </div>
            </div>
        <?php endif; ?>

        <div class="work-card__body p-8 flex flex-col">
            <?php if ( $categories && ! is_wp_error( $categories ) ) : ?>
                <span class="work-card__category bg-zinc-950/80 border border-border-dark text-[10px] font-bold uppercase tracking-wider text-accent px-3 py-1 rounded-full self-start mb-4">
                    <?php echo esc_html( $categories[0]->name ); ?>
                </span>
            <?php endif; ?>

            <h3 class="work-card__title text-2xl font-bold text-white mb-3 group-hover:text-accent transition duration-300"><?php the_title(); ?></h3>
            <p class="work-card__excerpt text-zinc-400 text-sm leading-relaxed mb-6"><?php echo devportfolio_excerpt( 100 ); ?></p>

            <?php if ( $technologies ) : ?>
                <div class="work-card__tech flex flex-wrap gap-2">
                    <?php foreach ( array_slice( $technologies, 0, 4 ) as $tech ) : ?>
                        <span class="bg-zinc-950 border border-border-dark px-2.5 py-1 rounded-lg text-xs text-zinc-300"><?php echo esc_html( $tech ); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </a>
</article>
