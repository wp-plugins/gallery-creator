<form method="get" class="media-upload-form type-form" onsubmit="return false">
	<label for="gallerycreator_columns">Number of columns</label>
	<select id="gallerycreator_columns" name="gallerycreator_columns">
		<option value="1" selected="selected">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
	<label for="gallerycreator_imagesize">Image size</label>
	<select id="gallerycreator_imagesize" name="gallerycreator_imagesize">
		<option value="thumbnail">Thumbnail</option>
		<option value="medium" selected="selected">Medium</option>
		<option value="large">Large</option>
		<option value="full">Full</option>
	</select>
	<label for="gallerycreator_orderby">Order by</label>
	<select id="gallerycreator_orderby" name="gallerycreator_orderby">
		<option value="name" selected="selected">Name</option>
		<option value="menu_order">Menu order</option>
	</select>
	<label for="gallerycreator_linkto">Link to</label>
	<select id="gallerycreator_linkto" name="gallerycreator_linkto">
		<option value="file" selected="selected">File</option>
		<option value="">Page</option>
	</select>
	<!-- There will be support for choosing which images to include -->
	<input type="button" value="Cancel" onclick="galleryCreator.button_cancel()" class="button input_clear"/>
	<input type="submit" value="Insert" onclick="galleryCreator.button_insert()" class="button"/>
</form>