<select type='text' name="<?php echo htmlspecialchars($html_name)?>">

<?php foreach($options['options'] as $option) {
?>
	<option value="<?php echo htmlspecialchars($option['value']); ?>" <?php if($option['value']==$query[$html_name]) { ?> selected='selected'<?php } ?> >
		<?php echo htmlspecialchars($option['label']);?>
	</option>
<?php } ?>
</select>
