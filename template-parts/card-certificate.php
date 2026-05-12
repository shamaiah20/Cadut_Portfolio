<?php
/**
 * Template Part: Certificate Card (Premium)
 *
 * @package DevPortfolio
 */

$status     = get_field( 'cert_status' );
$icon_class = get_field( 'cert_icon' ) ?: 'fa-solid fa-award';
$issuer     = get_field( 'cert_issuer' );
$date       = get_field( 'cert_date' );
$url        = get_field( 'cert_url' );
?>

<div class="cert-card bg-white rounded-[2rem] p-8 md:p-10 shadow-sm border border-gray-50 flex flex-col h-full hover:shadow-xl transition-all duration-500 group">
    
    <div class="flex justify-between items-start mb-10">
        <!-- Icon Box -->
        <div class="cert-icon-box w-16 h-16 rounded-2xl flex items-center justify-center text-[#7C3AED] transition-colors duration-300">
            <i class="<?php echo esc_attr( $icon_class ); ?> text-2xl group-hover:scale-110 transition-transform"></i>
        </div>

        <!-- Status Badge -->
        <?php if ( $status ) : ?>
            <span class="text-gray-400 text-[9px] font-black uppercase tracking-[0.2em] mt-2">
                <?php echo esc_html( $status ); ?>
            </span>
        <?php endif; ?>
    </div>

    <!-- Content -->
    <div class="flex-grow">
        <h3 class="text-xl md:text-2xl font-extrabold text-[#111827] mb-3 leading-tight">
            <?php the_title(); ?>
        </h3>
        
        <p class="text-gray-400 text-xs md:text-sm font-medium mb-8">
            <?php if ( $issuer ) : ?>
                Issued by <?php echo esc_html( $issuer ); ?>
            <?php endif; ?>
            <?php if ( $issuer && $date ) echo ' • '; ?>
            <?php if ( $date ) : ?>
                <?php echo esc_html( $date ); ?>
            <?php endif; ?>
        </p>
    </div>

    <!-- Footer Action -->
    <div class="mt-auto pt-6 border-t border-gray-50">
        <?php if ( $url ) : ?>
            <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 text-[#7C3AED] text-sm font-bold hover:gap-3 transition-all">
                Verify Credential
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="7" y1="17" x2="17" y2="7"></line>
                    <polyline points="7 7 17 7 17 17"></polyline>
                </svg>
            </a>
        <?php else : ?>
            <span class="text-gray-300 text-sm font-bold flex items-center gap-2">
                Internal Validation
                <i class="fa-solid fa-lock text-[10px]"></i>
            </span>
        <?php endif; ?>
    </div>
</div>
