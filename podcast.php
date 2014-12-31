<?php
/**
 * Modified from the RSS 0.92 Feed Template for displaying RSS 0.92 Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>

<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">

<channel>
	<title><?php bloginfo_rss('name'); wp_title_rss(); ?></title>
	<link><?php bloginfo_rss('url') ?></link>
	<language>en-us</language>
	<copyright>&#x2117; &amp; &#xA9; 2009 Midi Onodera</copyright>
	<itunes:subtitle>A collage of formats and mediums</itunes:subtitle>
	<itunes:author>Midi Onodera</itunes:author>
	<itunes:summary>Midi Onodera is an award-winning Canadian filmmaker who has been directing, producing and writing films for over twenty years. She has over twenty-five independent short films to her credit as well as a theatrical feature film and several video shorts.</itunes:summary>
	<description>Midi Onodera is an award-winning Canadian filmmaker who has been directing, producing and writing films for over twenty years. She has over twenty-five independent short films to her credit as well as a theatrical feature film and several video shorts.</description>

	<itunes:owner>
		<itunes:name>Midi Onodera</itunes:name>
		<itunes:email>midionodera@sympatico.ca</itunes:email>
	</itunes:owner>

	<itunes:image href="<?php bloginfo('template_directory'); ?>/images/midipodcast.jpg" />

	<itunes:category text="Arts">
		<itunes:category text="Visual Arts" />
	</itunes:category>

	<?php do_action('rss_head'); ?>
	<?php query_posts('cat=5,47'); ?>
	<?php while (have_posts()) : the_post(); ?>
		<item>
			<title><?php the_title_rss() ?></title>

			<itunes:author>Midi Onodera</itunes:author>

			<itunes:subtitle><?php the_excerpt_rss() ?></itunes:subtitle>

			<itunes:summary><?php the_content_rss() ?></itunes:summary>

			<enclosure url="http://www.midionodera.com<?php marty_metacontrol("ipod") ?>" length="<?php marty_metacontrol("filesize") ?>" type="video/x-m4v" />

			<guid isPermaLink="false">http://www.midionodera.com<?php the_guid(); ?></guid>

			<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>

			<itunes:duration><?php marty_metacontrol("duration") ?></itunes:duration>

		</item>
	<?php endwhile; ?>
</channel>
</rss>