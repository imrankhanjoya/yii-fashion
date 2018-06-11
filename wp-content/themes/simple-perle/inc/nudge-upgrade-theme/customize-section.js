( function( api ) {

	api.sectionConstructor['nudge-upgrade-theme'] = api.Section.extend({
		attachEvents: function () {},
		isContextuallyActive: function () {
			return true;
		}
	});
})( wp.customize );
