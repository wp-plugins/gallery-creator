var $ = jQuery;

function GalleryCreator()
{
	this.button_cancel = function()
	{
		top.tb_remove();
	}
	
	this.button_insert = function()
	{
		var tag = this.tag_build();
		this.tag_insert(tag);
		top.tb_remove();
	}
	
	this.tag_build = function()
	{
		// Create and open the gallery tag
		var gallery_tag = '[gallery';
		
		// Get the number of columns
		var columns = $('#gallerycreator_columns').val();
		gallery_tag += ' columns="'+ columns +'"';
		
		// Get the image size
		var imagesize = $('#gallerycreator_imagesize').val();
		gallery_tag += ' size="'+ imagesize +'"';
		
		// Get the image order
		var orderby = $('#gallerycreator_orderby').val();
		gallery_tag += ' orderby="'+ orderby +' ASC"';
		
		// Get image link
		var linkto = $('#gallerycreator_linkto').val();
		gallery_tag += ' link="'+ linkto +'"';
		
		// Close the gallery tag
		gallery_tag += ']';
		return gallery_tag;
	}
	
	// Inserts a tag in the editor (inspired by wp-media-flickr.js)
	this.tag_insert = function(h)
	{
		var ed;

		if (typeof top.tinyMCE != 'undefined' && (ed = top.tinyMCE.activeEditor) && !ed.isHidden())
		{
			ed.focus();
			if (top.tinymce.isIE)
			{
				ed.selection.moveToBookmark(top.tinymce.EditorManager.activeEditor.windowManager.bookmark);
			}
			
			if (h.indexOf('[caption') === 0)
			{
				if (ed.plugins.wpeditimage)
				{
					h = ed.plugins.wpeditimage._do_shcode(h);
				}
			}
			else if (h.indexOf('[gallery') === 0)
			{
				if (ed.plugins.wpgallery)
				{
					h = ed.plugins.wpgallery._do_gallery(h);
				}
			}

			ed.execCommand('mceInsertContent', false, h);
		}
		else if (typeof top.edInsertContent == 'function')
		{
			top.edInsertContent(top.edCanvas, h);
		}
		else
		{
			top.jQuery(top.edCanvas).val(top.jQuery(top.edCanvas).val() + h);
		}
	}
}

var galleryCreator = new GalleryCreator();
