<h3><?php echo $channel->title; ?></h3>

<?php foreach ($sub_channels as $sub_channel): ?>
	<h4 class="channel child"><?php echo anchor('videos/channel/'.$channel->slug.'/'.$sub_channel->slug, $sub_channel->title);?></h4>
<?php endforeach; ?>

<?php if ( ! empty($videos)): ?>
	
	<?php foreach ($videos as $video): ?>
	
		<div class="video listing">
			<!-- Post heading -->

			<div class="heading">

				<?php if (Settings::get('video_thumb_enabled') && $video->thumbnail): ?>
					<div class="thumbnail">
						<img src="<?php echo base_url().UPLOAD_PATH.'videos/thumbs/'.$video->thumbnail ?>" width="<?php echo $thumb_width ?>" />
					</div>
				<?php endif; ?>

				<h3><?php echo anchor('videos/view/'. $video->slug, $video->title); ?></h3>
				<!--<div class="date"><?php echo lang('video:date_label');?>: <?php echo format_date($video->created_on); ?></div>-->
			</div>
			<div class="intro"><?php echo $video->intro; ?></div>
		</div>
	<?php endforeach; ?>

	<?php echo $pagination['links']; ?>

<?php else: ?>
	<p><?php echo lang('video:currently_no_videos');?></p>
<?php endif; ?>
