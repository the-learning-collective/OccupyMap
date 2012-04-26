<div class="block">
<a href="<?php echo url::site() ?>?full=1">View Full Website</a>
</div>
<div class="block">
	<h2 class="submit"><a href="<?php echo url::site()."mobile/reports/submit/" ?>">Add a Story</a></h2>
</div>
<div class="block">
	<h2 class="expand">Recent Reports</h2>
	<div class="collapse">
		<ul>
			<?php
			foreach ($incidents as $incident)
			{
				$incident_date = $incident->incident_date;
				$incident_date = date('M j Y', strtotime($incident->incident_date));
				echo "<li><strong><a href=\"".url::site()."mobile/reports/view/".$incident->id."\">".$incident->incident_title."</a></strong>";
				echo "&nbsp;&nbsp;<i>$incident_date</i></li>";
			}
			?>
		</ul>
	</div>
</div>
<div class="block">
	<h2 class="expand">Related News</h2>
	<div class="collapse">
		<ul>
			<?php
			foreach ($feeds as $feed)
			{
				$feed_date = date('M j Y', strtotime($feed->item_date));
				echo "<li><strong><a href=\"".$feed->item_link."\">".$feed->item_title."</a></strong>";
				//echo "&nbsp;&nbsp;<i>$incident_date</i></li>";
				echo "</li>";
			}
		?>
		</ul>
	</div>
</div>
<h2 class="block_title">Reports By Category</h2>
<div class="block">
	<?php
	foreach ($categories as $category => $category_info)
	{
		$category_title = $category_info[0];
		$category_color = $category_info[1];
		$category_image = '';
		$category_count = $category_info[3];
		$color_css = 'class="swatch" style="background-color:#'.$category_color.'"';
		if (count($category_info[4]) == 0)
		{
			echo '<h2 class="other"><a href="'.url::site().'mobile/reports/index/'.$category.'"><div '.$color_css.'>'.$category_image.'</div>'.$category_title.'</a><span>'.$category_count.'</span></h2>';
		}
		else
		{
			echo '<h2 class="expand"><div '.$color_css.'>'.$category_image.'</div>'.$category_title.'</h2>';
		}
		
		// Get Children
		echo '<div class="collapse">';
		foreach ($category_info[4] as $child => $child_info)
		{
			$child_title = $child_info[0];
			$child_color = $child_info[1];
			$child_image = '';
			$child_count = $child_info[3];
			$color_css = 'class="swatch" style="background-color:#'.$child_color.'"';
			echo '<h2 class="other"><a href="'.url::site().'mobile/reports/index/'.$child.'"><div '.$color_css.'>'.$child_image.'</div>'.$child_title.'</a><span>'.$child_count.'</span></h2>';
		}
		echo '</div>';
	}
	?>				
</div>
<h2 class="block_title">Mobile Apps</h2>
<div class="block">
    <h2 class="expand">Mobile Apps</h2>
    <div class="collapse">
        

        	<li><a href="http://itunes.apple.com/us/app/ushahidi-ios/id410609585?mt=8">iOS App</a></li>
			<li><a href="https://market.android.com/details?id=com.ushahidi.android.app">Android App</a></li>
    </div>
    
</div>


<h2 class="block_title">More</h2>

<div class="block">
	<h2 class="other"><a href="#">Contact Us</a></h2>
	<h2 class="other"><a href="#">About Us</a></h2>
</div>