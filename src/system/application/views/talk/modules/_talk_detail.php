
<div class="detail">
	<h1><?php echo $detail->talk_title?></h1>

	<p class="info">
		<strong>
			<?php
			$speaker_names = array();
			foreach($speakers as $speaker): ?>
			<?php 
			if(!empty($speaker->speaker_id) && $speaker->status!='pending'){
				if(empty($speaker->full_name)){ $speaker->full_name = 'N/A'; }
				$speaker_names[] = '<a href="/user/view/'.$speaker->speaker_id.'">'.$speaker->full_name.'</a>';
			}else{
				$speaker_names[] = $speaker->speaker_name;
			}
			?>
			<?php endforeach; echo implode(', ',$speaker_names); ?>
		</strong> (<?php echo $detail->display_datetime; ?>)
		<br/> 
		<?php echo escape($detail->tcid); ?> at <strong><a href="/event/view/<?php echo $detail->event_id; ?>"><?php echo escape($detail->event_name); ?></a></strong> (<?php echo escape($detail->lang_name);?>)
	</p>

	<p class="rating">
		<?php echo $rstr; ?>
	</p>

	<div class="desc">
		<span align="left"><?php
		if(!empty($speaker_img)){
			foreach($speaker_img as $uid => $img){
				echo '<a href="/user/view/'.$uid.'"><img src="'.$img.'" align="left" border="0" style="margin-right:10px;" height="50" width="50"></a>'; 
			}
		}
		?></span>
		<?php echo auto_p(auto_link(escape_allowing_presentation_tags($detail->talk_desc)));?>
	</div>
	
	<p class="quicklink">
		Quicklink: <strong><a href="<?php echo $this->config->site_url(); ?><?php echo $detail->tid; ?>"><?php echo $this->config->site_url(); ?><?php echo $detail->tid; ?></a></strong>
	</p>
	
	<?php if(!empty($track_info)): ?>
	<p class="quicklink">
	<?php
	echo '<b>Track(s):</b> '; foreach($track_info as $t){ echo $t->track_name; }
	?>
	</p>
	<?php endif; ?>
	
	<?php if(!empty($detail->slides_link)): ?>
	<p class="quicklink">
		Slides: <strong><a href="<?php echo $detail->slides_link; ?>"><?php echo $detail->talk_title; ?></a></strong>
	</p>
	<?php endif; ?>

	<?php if(isset($claimed[0]) && $this->session->userdata('ID')==$claimed[0]->userid): ?>
	<!--<p class="opts">
		<a class="btn-small" href="/user/comemail/talk/<?php echo $detail->tid; ?>">Email me my comments</a>
	</p>-->
	<?php endif; ?>
	<div class="clear"></div>
</div>
