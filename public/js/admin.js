$(function() {
	$('.play').click(function() {
		$('<audio controls><source src=\"' + this.href + '\" type=\"audio/mp4a\"></audio>').insertAfter(this);
		return false
	})
});