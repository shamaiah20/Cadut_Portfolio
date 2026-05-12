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

<div class="bg-white p-8 rounded-[32px] border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-purple-900/5 transition-all group h-full flex flex-col">
    <div class="flex items-center gap-4 mb-6">
        <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-[#7C3AED] text-xl group-hover:bg-[#7C3AED] group-hover:text-white transition-colors flex-shrink-0">
            <i class="<?php echo esc_attr($icon ?: 'fa-solid fa-code'); ?>"></i>
        </div>
        <div>
            <h3 class="text-lg font-black text-slate-900 leading-tight"><?php the_title(); ?></h3>
            <span class="text-[10px] font-black text-[#7C3AED] uppercase tracking-widest"><?php echo esc_html($level); ?></span>
        </div>
    </div>

    <?php if($description): ?>
    <div class="mb-6 flex-grow">
        <p class="text-gray-500 text-sm font-medium leading-relaxed line-clamp-3">
            <?php echo esc_html($description); ?>
        </p>
    </div>
    <?php endif; ?>

    <div class="space-y-2 mt-auto">
        <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-widest text-slate-400">
            <span>Proficiency</span>
            <span><?php echo esc_html($percentage); ?>%</span>
        </div>
        <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-[#7C3AED] rounded-full transition-all duration-1000" style="width: <?php echo esc_attr($percentage); ?>%"></div>
        </div>
    </div>
</div>
