
<div class="wrap">
<h2>getMovingJQuery</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'topvotesOptions' ); ?>
    <table class="form-table">
        <tr valign="top" rowspan="2">
			<th scope="row" ><strong>JQuery Core Library</strong></th>
        </tr>
        <tr valign="top">
			<td>
				<span>Include </span>
				<input type="checkbox" name="includeJQueryCore" value="checkbox" <?php if (get_option('includeJQueryCore',true)) echo "checked='checked'"; ?>
			</td>
			<td>
				<span>Version: </span>
				<input type="text" name="JQueryCoreVersion" value="<?php echo _topvotes_option('JQueryCoreVersion','1.4.2'); ?>" />
			</td>
			<td>
			</td>
        </tr>
         

        <tr valign="top" rowspan="2">
			<th scope="row" ><strong>JQuery UI Library</strong></th>
        </tr>
        <tr valign="top">
			<td>
				<span>Include </span>
				<input type="checkbox" name="includeJQueryUI" value="checkbox" <?php if (get_option('includeJQueryUI',true)) echo "checked='checked'"; ?>
			</td>
			<td>
				<span>Version: </span>
				<input type="text" name="JQueryUIVersion" value="<?php echo _topvotes_option('JQueryUIVersion','1.8.2'); ?>" />
			</td>
			<td>
			</td>
        </tr>
        <tr valign="top" rowspan="3">
			<th scope="row" ><strong>JQuery UI CSS Theme</strong></th>
        </tr>
        <tr>
			<td>
				<span>Include </span>
				<input type="checkbox" name="includeJQueryTheme" value="checkbox" <?php if (get_option('includeJQueryTheme',true)) echo "checked='checked'"; ?>
			</td>
			<td>
				<span>Themename: </span>
				<input type="text" id="JQueryUIThemeName" name="JQueryUIThemeName" value="<?php echo _topvotes_option('JQueryUIThemeName','base'); ?>" />
			</td>
			<td>
				<span>Select a theme:</span>
				<select name="themes" id="themes" onchange="jQuery('#JQueryUIThemeName').val( jQuery(this).children('option:selected').text() );">
					<option value="base">Base</option>
					<option>UI lightness</option>	
					<option>UI darkness</option>
					<option>Smoothness</option>		
					<option>Start</option>
					<option>Redmond</option>
					<option>Sunny</option>
					<option>Overcast</option>
					<option>Le Frog</option>
					<option>Flick</option>
					<option>Pepper Grinder</option>
					<option>Eggplant</option>
					<option>Dark Hive</option>
					<option>Cupertino</option>
					<option>South Street</option>
					<option>Blitzer</option>			
					<option>Humanity</option>	
					<option>Hot Sneaks</option>
					<option>Excite Bike</option>
					<option>Vader</option>
					<option>Dot Luv</option>		
					<option>Mint Choc</option>
					<option>Black Tie</option>
					<option>Trontastic</option>
					<option>Swanky Purse</option>
				</select>			
			</td>
		</tr>
    </table>
    
    <p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>
</div>