<?php if ( ! empty($videos)): ?>
	
	<?php $channel = null; foreach ($videos as $video): ?>
	
		<?php if ($channel != $video->channel_id && $video->channel_id !== 0): ?>
			
			<h3 class="channel"><?php echo anchor('videos/channel/'.$video->channel_slug, $video->channel_title);?></h3>
			
		<?php endif ?>
		
		<div class="video listing <?php echo $video->channel_parent_id ? 'child' : 'parent' ?>">
			<!-- Post heading -->
			<div class="heading">
	
				<?php if (Settings::get('video_thumb_enabled') && $video->thumbnail): ?>
					<div class="thumbnail">
						<img src="<?php echo base_url().UPLOAD_PATH.'videos/thumbs/'.$video->thumbnail ?>" width="<?php echo $thumb_width ?>" />
					</div>
				<?php endif; ?>

				<h4><?php echo anchor('videos/view/'. $video->slug, $video->title); ?></h4>
				<!--<div class="date"><?php echo lang('video:date_label');?>: <?php echo format_date($video->created_on); ?></div>-->
				
			</div>
			<div class="intro"><?php echo $video->intro; ?></div>
		</div>
	<?php $channel = $video->channel_id; endforeach; ?>

	<?php echo $pagination['links']; ?>

<?php else: ?>
	<p><?php echo lang('video:currently_no_videos');?></p>
<?php endif; ?>
