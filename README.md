# MLA-Shim
An intermediate plugin for the WordPress Plugin "Media Library Assistant".

# Usage
This plugin is to be used with Media Library Assistant Alternate Shortcode. See the Example Usage section below.

__Parameters:__
- shortcode (required), the shortcode to use
- parameters (required), the name of the accepted parameters of the above shortcode
- values (required), the corresponding values of the above parameters
- content (defaults to `''`), if set to anything, the final value from above will be used as content for the shortcode
- delimiter (defaults to `'|'`), the character to split the item values by (cannot be `','`)
- items_per_container (defaults to `0`), the number of shortcodes per div. a value of `0` indicates all items will be contained by one div

# Example Usage
The following is an example of how to use this plugin.
```
[mla_gallery attachment_category="the-cat" numberposts=4 mla_caption="{+title+}" mla_style=none mla_alt_shortcode="mla_shim" shortcode="the_short" mla_alt_ids_name="values" mla_alt_ids_value="{+filelink_url+}|{+thumbnail_url+}|thumb|{+query:mla_caption+}" parameters="source,thumb,type" items_per_container=2 content="TRUE"]
```

Which will result in the following
```
<div class="shim-container">
  [the_short source={+filelink_url+} thumb={+thumbnail_url+} type=thumb]{+title+}[/the_short]
  [the_short source={+filelink_url+} thumb={+thumbnail_url+} type=thumb]{+title+}[/the_short]
</div>
<div class="shim-container">
  [the_short source={+filelink_url+} thumb={+thumbnail_url+} type=thumb]{+title+}[/the_short]
  [the_short source={+filelink_url+} thumb={+thumbnail_url+} type=thumb]{+title+}[/the_short]
</div>
```
