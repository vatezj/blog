<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('post.index') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    @foreach ($pages as $page)
        <url>
            <loc>{{ route('page.show',$page->name) }}</loc>
            <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach

    @foreach ($posts as $post)
        <url>
            <loc>{{ route('post.show',$post->slug) }}</loc>
            <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>