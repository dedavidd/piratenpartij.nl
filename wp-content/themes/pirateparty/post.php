<div class='post'>
	<div class='title'>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php if ('post' == get_post_type()): ?>
			<div class='muted'>
				<p>
					Post by <?php the_author_posts_link(); ?> on 
					<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php echo get_the_time('j F, Y'); ?></a>
				</p>
			</div>
        <?php endif; ?>
		</div>
	</div>

	<article>
		<?php the_content(''); ?>
	</article>

	<div class='info'>
		<?php if ('post' == get_post_type()): ?>
			<a class="comments" href="<?php echo (is_home() ? the_permalink() : '' ).'#comments' ?>">
				<?php echo get_comments_number(); ?>
			</a>
        <?php endif; ?>
		<p class="categories"><?php the_category(', ') ?></p>
		<p class="tags"><?php the_tags('', ', '); ?></p>

		<?php if (!is_single()): if ($pos=strpos($post->post_content, '<!--more-->')): ?>
			<div class='continue'>
				<a href="<?php the_permalink(); ?>">Verder lezen '<?php the_title(); ?>' &rsaquo;</a>
			</div>
		<?php endif; else:
			$prev_post = get_previous_post();
			$next_post = get_next_post();
		?>
		<footer>
			<ul class="pager">
				<?php if (!empty($next_post)): ?>
					<li><a href="<?php echo get_permalink($next_post->ID) ?>">&lsaquo; <?php echo $next_post->post_title ?></a></li>
				<?php endif; if (!empty($prev_post)): ?>
					<li><a href="<?php echo get_permalink($prev_post->ID) ?>"><?php echo $prev_post->post_title ?> &rsaquo;</a></li>
				<?php endif; ?>
			</ul>
		</footer>
	<?php endif; ?>
</div>
