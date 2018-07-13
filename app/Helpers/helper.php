<?php

function defaultThumb()
{
	return '/img/default-post-thumb.png';
}

function defaultTinyThumb()
{
	return '/img/default-tiny-post-thumb.png';
}

function genEncryptedUniqueCode()
{
	return md5(encrypt(bcrypt(microtime())));
}

function getImage($type, $image)
{
	return route('images', compact('type', 'image'));
}

function flush_all_post_cache($slug = null)
{
	if($slug) {
		\Cache::forget("post-$slug");
    }

	\Cache::forget('featured_posts');
}

function clearSingleCachedPost($post = null)
{
	if($post) {
		\Cache::forget('post-'.$post->slug);
		\Cache::forget('api-post-'.$post->slug);
	}
}

function featuredImage($src = null)
{
	if(empty($src))
		$src = '/assets/img/placeholder.png';

	return asset($src);
}

function userImage($src)
{
	if(empty($src))
		$src = '/assets/img/default-avatar.png';

	return asset($src);
}

function postImagesDirectory()
{
	return uploadDirectoryName() . '/' .imageUploadDirectory() . '/posts';
}

function uploadDirectoryName()
{
	return 'storage/uploads';
}

function imageUploadDirectory()
{
	return "images";
}

function adminPagiNo($n = 50)
{
	return $n;
}

function webPagiNo($n = 10)
{
	return $n;
}

function appName()
{
	return config('app.name', 'Business Classifieds');
}

function dashboardRoute()
{
	if( ! \Auth::check())
		return null;

	if(\Auth::user()->isAdmin)
		return route('admin.dashboard');

	if(\Auth::user()->isAdvertiser)
        return route('advertiser.dashboard');

    if(\Auth::user()->isSubscriber)
		return url('/');

	return null;
}

function generateVerificationCode()
{
	return sha1(md5(uniqid()));
}

function delete_file($path)
{
	if(file_exists(public_path($path))) {
		$filename = basename($path);
		$thumb_path = str_replace($filename, 'thumb-'.$filename, $path);
		if(file_exists(public_path($thumb_path)))
			unlink(public_path($thumb_path));

		$tinythumb_path = str_replace($filename, 'tiny-thumb-'.$filename, $path);
		if(file_exists(public_path($tinythumb_path)))
			unlink(public_path($tinythumb_path));

		if(file_exists(public_path($path)))
			unlink(public_path($path));

		return true;
	}

	return false;
}

function genFilename($name, $ext)
{
	$name = str_slug($name);
	return "$name-". uniqid() . ".$ext";
}

function genImageName($name, $ext)
{
	$name .= 'img';
	return genFilename($name, $ext);
}

function uploadImage($imagefile, $nameprefix = null, $directory = null)
{
	$imageDirectory = imageUploadDirectory();
	if($directory)
		$imageDirectory .= "/$directory";

	return uploadFile($imagefile, $nameprefix, $imageDirectory);
}

function uploadFile($file, $nameprefix = null, $directory = null)
{
	$ext = $file->guessClientExtension();

	$filename = genFilename($nameprefix, $ext);
	$path = uploadDirectoryName();

	if($directory)
		$path .= "/$directory";

	if($file->move(public_path($path), $filename))
	{
		$full_path = public_path("/$path/$filename");

		if(basename($directory) == 'user')
		{
			\Image::make($full_path)->fit(300)->save(public_path("/$path/thumb-$filename"));
			\Image::make($full_path)->fit(30)->save(public_path("/$path/tiny-thumb-$filename"));
		}
		else {
			\Image::make($full_path)->fit(300, 280)->save(public_path("/$path/thumb-$filename"));
			\Image::make($full_path)->fit(30, 28)->save(public_path("/$path/tiny-thumb-$filename"));
		}

		return "/$path/$filename";
	}

	return null;
}

function route_from_base($route, $params = null)
{
	if(empty($params))
		$url = route($route);
	else
		$url = route($route, $params);

	return url_from_base($url);
}

function url_from_base($url)
{
	$url = str_replace(url('/'), '', $url);

	if(empty($url))
		$url = '/';

	return $url;
}