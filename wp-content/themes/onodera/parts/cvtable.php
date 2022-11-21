<?php if ( have_rows('tablerow') ) : ?>
<table>
<?php while ( have_rows('tablerow') ) : the_row(); ?>
<tr>
	<td class="year"><?php the_sub_field('year'); ?></td>
	<td class="details"><?php the_sub_field('details'); ?></td>
</tr>
<?php endwhile; ?>
</table>
<?php endif; ?>
