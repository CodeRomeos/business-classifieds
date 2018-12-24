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

function exclude_null(Array $arr)
{
	return array_filter($arr, function($el) {
		return !empty($el);
	});
}

function indian_states_and_cites()
{
	return [
		'AN' => ['state' => 'Andaman and Nicobar', 'cities' => [
			"Port Blair"
		]],
		'AP' => ['state' => 'Andhra Pradesh', 'cities' => [
			"Adoni","Amalapuram","Anakapalle","Anantapur","Bapatla","Bheemunipatnam","Bhimavaram","Bobbili","Chilakaluripet","Chirala","Chittoor","Dharmavaram","Eluru","Gooty","Gudivada","Gudur","Guntakal","Guntur","Hindupur","Jaggaiahpet","Jammalamadugu","Kadapa","Kadiri","Kakinada","Kandukur","Kavali","Kovvur","Kurnool","Macherla","Machilipatnam","Madanapalle","Mandapeta","Markapur","Nagari","Naidupet","Nandyal","Narasapuram","Narasaraopet","Narsipatnam","Nellore","Nidadavole","Nuzvid","Ongole","Palacole","Palasa Kasibugga","Parvathipuram","Pedana","Peddapuram","Pithapuram","Ponnur","Proddatur","Punganur","Puttur","Rajahmundry","Rajam","Rajampet","Ramachandrapuram","Rayachoti","Rayadurg","Renigunta","Repalle","Salur","Samalkot","Sattenapalle","Srikakulam","Srikalahasti","Srisailam Project (Right Flank Colony) Township","Sullurpeta","Tadepalligudem","Tadpatri","Tanuku","Tenali","Tirupati","Tiruvuru","Tuni","Uravakonda","Venkatagiri","Vijayawada","Vinukonda","Visakhapatnam","Vizianagaram","Yemmiganur","Yerraguntla"
		]],
		'AR' => ['state' => 'Arunachal Pradesh', 'cities' => ["Naharlagun","Pasighat"]],
		'AS' => ['state' => 'Assam', 'cities' => [
			"Barpeta","Bongaigaon City","Dhubri","Dibrugarh","Diphu","Goalpara","Guwahati","Jorhat","Karimganj","Lanka","Lumding","Mangaldoi","Mankachar","Margherita","Mariani","Marigaon","Nagaon","Nalbari","North Lakhimpur","Rangia","Sibsagar","Silapathar","Silchar","Tezpur","Tinsukia"
		]],
		'BR' => ['state' => 'Bihar', 'cities' => [
			"Araria","Arrah","Arwal","Asarganj","Aurangabad","Bagaha","Barh","Begusarai","Bettiah","Bhabua","Bhagalpur","Buxar","Chhapra","Darbhanga","Dehri-on-Sone","Dumraon","Forbesganj","Gaya","Gopalganj","Hajipur","Jamalpur","Jamui","Jehanabad","Katihar","Kishanganj","Lakhisarai","Lalganj","Madhepura","Madhubani","Maharajganj","Mahnar Bazar","Makhdumpur","Maner","Manihari","Marhaura","Masaurhi","Mirganj","Mokameh","Motihari","Motipur","Pandit Deendayal Upadhyay Nagar", "Munger","Murliganj","Muzaffarpur","Narkatiaganj","Naugachhia","Nawada","Nokha","Patna","Piro","Purnia","Rafiganj","Rajgir","Ramnagar","Raxaul Bazar","Revelganj","Rosera","Saharsa","Samastipur","Sasaram","Sheikhpura","Sheohar","Sherghati","Silao","Sitamarhi","Siwan","Sonepur","Sugauli","Sultanganj","Supaul","Warisaliganj"
		]],
		'CH' => ['state' => 'Chandigarh', 'cities' => ["Chandigarh"]],
		'CT' => ['state' => 'Chhattisgarh', 'cities' => [
			"Ambikapur","Bhatapara","Bhilai Nagar","Bilaspur","Chirmiri","Dalli-Rajhara","Dhamtari","Durg","Jagdalpur","Korba","Mahasamund","Manendragarh","Mungeli","Naila Janjgir","Raigarh","Raipur","Rajnandgaon","Sakti","Tilda Newra"
		]],
		'DN' => ['state' => 'Dadra and Nagar Haveli', 'cities' => ["Silvassa"]],
		'DD' => ['state' => 'Daman and Diu', 'cities' => [
			'Bhimpore', 'Dadhel', 'Daman', 'Diu', 'Dunetha', 'Kachigam', 'Kadaiya', 'Marwad', 'Nagao Beach'
		]],
		'DL' => ['state' => 'Delhi', 'cities' => ["Delhi", "New Delhi"]],
		'GA' => ['state' => 'Goa', 'cities' => ["Mapusa", "Margao", "Marmagao", "Panaji"]],
		'GJ' => ['state' => 'Gujarat', 'cities' => [
			"Adalaj","Ahmedabad","Amreli","Anand","Anjar","Ankleshwar","Bharuch","Bhavnagar","Bhuj","Chhapra","Deesa","Dhoraji","Godhra","Jamnagar","Kadi","Kapadvanj","Keshod","Khambhat","Lathi","Limbdi","Lunawada","Mahesana","Mahuva","Manavadar","Mandvi","Mangrol","Mansa","Mahemdabad","Modasa","Morvi","Nadiad","Navsari","Padra","Palanpur","Palitana","Pardi","Patan","Petlad","Porbandar","Radhanpur","Rajkot","Rajpipla","Rajula","Ranavav","Rapar","Salaya","Sanand","Savarkundla","Sidhpur","Sihor","Songadh","Surat","Talaja","Thangadh","Tharad","Umbergaon","Umreth","Una","Unjha","Upleta","Vadnagar","Vadodara","Valsad","Vapi","Vapi","Veraval","Vijapur","Viramgam","Visnagar","Vyara","Wadhwan","Wankaner"]
		],
		'HR' => ['state' => 'Haryana', 'cities' =>[
			"Bahadurgarh","Bhiwani","Charkhi Dadri","Faridabad","Fatehabad","Gohana","Gurugram","Hansi","Hisar","Jind","Kaithal","Karnal","Ladwa","Mahendragarh","Mandi Dabwali","Narnaul","Narwana","Palwal","Panchkula","Panipat","Pehowa","Pinjore","Rania","Ratia","Rewari","Rohtak","Safidon","Samalkha","Sarsod","Shahbad","Sirsa","Sohna","Sonipat","Taraori","Thanesar","Tohana","Yamunanagar"
		]],
		'HP' => ['state' => 'Himachal Pradesh', 'cities' => [
			"Mandi","Nahan","Palampur","Shimla","Solan","Sundarnagar"
		]],
		'JK' => ['state' => 'Jammu and Kashmir', 'cities' => [
			"Anantnag","Baramula","Jammu","Kathua","Punch","Rajauri","Sopore","Srinagar","Udhampur"
		]],
		'JH' => ['state' => 'Jharkhand', 'cities' => [
			"Adityapur","Bokaro Steel City","Chaibasa","Chatra","Chirkunda","Medininagar (Daltonganj)","Deoghar","Dhanbad","Dumka","Giridih","Gumia","Hazaribag","Jamshedpur","Jhumri Tilaiya","Lohardaga","Madhupur","Mihijam","Musabani","Pakaur","Patratu","Phusro","Ramgarh","Ranchi","Sahibganj","Saunda","Simdega","Tenu dam-cum-Kathhara"
		]],
		'KA' => ['state' => 'Karnataka', 'cities' => [
			"Adyar","Afzalpur","Arsikere","Athni","Bengaluru","Belagavi","Ballari","Chikkamagaluru","Davanagere","Gokak","Hubli-Dharwad","Karwar","Kolar","Lakshmeshwar","Lingsugur","Maddur","Madhugiri","Madikeri","Magadi","Mahalingapura","Malavalli","Malur","Mandya","Mangaluru","Manvi","Mudalagi","Mudabidri","Muddebihal","Mudhol","Mulbagal","Mundargi","Mysuru","Nanjangud","Nargund","Navalgund","Nelamangala","Pavagada","Piriyapatna","Puttur","Rabkavi Banhatti","Raayachuru","Ranebennuru","Ramanagaram","Ramdurg","Ranibennur","Robertson Pet","Ron","Sadalagi","Sagara","Sakaleshapura","Sindagi","Sanduru","Sankeshwara","Saundatti-Yellamma","Savanur","Sedam","Shahabad","Shahpur","Shiggaon","Shikaripur","Shivamogga","Surapura","Shrirangapattana","Sidlaghatta","Sindhagi","Sindhnur","Sira","Sirsi","Siruguppa","Srinivaspur","Tarikere","Tekkalakote","Terdal","Talikota","Tiptur","Tumakaru","Udupi","Vijayapura","Wadi","Yadgir"
		]],
		'KL' => ['state' => 'Kerala', 'cities' => [
			"Adoor","Alappuzha","Attingal","Chalakudy","Changanassery","Cherthala","Chittur-Thathamangalam","Guruvayoor","Kanhangad","Kannur","Kasaragod","Kayamkulam","Kochi","Kodungallur","Kollam","Kottayam","Kozhikode","Kunnamkulam","Malappuram","Mattannur","Mavelikkara","Mavoor","Muvattupuzha","Nedumangad","Neyyattinkara","Nilambur","Ottappalam","Palai","Palakkad","Panamattom","Panniyannur","Pappinisseri","Paravoor","Pathanamthitta","Peringathur","Perinthalmanna","Perumbavoor","Ponnani","Punalur","Puthuppally","Koyilandy","Shoranur","Taliparamba","Thiruvalla","Thiruvananthapuram","Thodupuzha","Thrissur","Tirur","Vaikom","Varkala","Vatakara"
		]],
		'LD' => ['state' => 'Lakshadweep', 'cities' => [
			'Agatti Island', 'Amini', 'Andrott', 'Bangaram Atoll', 'Bitra', 'Chetlat Island', 'Kadmat Island', 'Kalpeni', 'Kavaratti', 'Kavaratti', 'Kiltan', 'Minicoy'
		]],
		'MP' => ['state' => 'Madhya Pradesh', 'cities' => [
			"Alirajpur","Ashok Nagar","Balaghat","Bhopal","Ganjbasoda","Gwalior","Indore","Itarsi","Jabalpur","Lahar","Maharajpur","Mahidpur","Maihar","Malaj Khand","Manasa","Manawar","Mandideep","Mandla","Mandsaur","Mauganj","Mhow Cantonment","Mhowgaon","Morena","Multai","Mundi","Murwara (Katni)","Nagda","Nainpur","Narsinghgarh","Narsinghgarh","Neemuch","Nepanagar","Niwari","Nowgong","Nowrozabad (Khodargama)","Pachore","Pali","Panagar","Pandhurna","Panna","Pasan","Pipariya","Pithampur","Porsa","Prithvipur","Raghogarh-Vijaypur","Rahatgarh","Raisen","Rajgarh","Ratlam","Rau","Rehli","Rewa","Sabalgarh","Sagar","Sanawad","Sarangpur","Sarni","Satna","Sausar","Sehore","Sendhwa","Seoni","Seoni-Malwa","Shahdol","Shajapur","Shamgarh","Sheopur","Shivpuri","Shujalpur","Sidhi","Sihora","Singrauli","Sironj","Sohagpur","Tarana","Tikamgarh","Ujjain","Umaria","Vidisha","Vijaypur","Wara Seoni"
		]],
		'MH' => ['state' => 'Maharashtra', 'cities' => [
			"Ahmednagar","Akola","Akot","Amalner","Ambejogai","Amravati","Anjangaon","Arvi","Aurangabad","Bhiwandi","Dhule","Kalyan-Dombivali","Ichalkaranji","Kalyan-Dombivali","Karjat","Latur","Loha","Lonar","Lonavla","Mahad","Malegaon","Malkapur","Mangalvedhe","Mangrulpir","Manjlegaon","Manmad","Manwath","Mehkar","Mhaswad","Mira-Bhayandar","Morshi","Mukhed","Mul","Greater Mumbai","Murtijapur","Nagpur","Nanded-Waghala","Nandgaon","Nandura","Nandurbar","Narkhed","Nashik","Navi Mumbai","Nawapur","Nilanga","Osmanabad","Ozar","Pachora","Paithan","Palghar","Pandharkaoda","Pandharpur","Panvel","Parbhani","Parli","Partur","Pathardi","Pathri","Patur","Pauni","Pen","Phaltan","Pulgaon","Pune","Purna","Pusad","Rahuri","Rajura","Ramtek","Ratnagiri","Raver","Risod","Sailu","Sangamner","Sangli","Sangole","Sasvad","Satana","Satara","Savner","Sawantwadi","Shahade","Shegaon","Shendurjana","Shirdi","Shirpur-Warwade","Shirur","Shrigonda","Shrirampur","Sillod","Sinnar","Solapur","Soyagaon","Talegaon Dabhade","Talode","Tasgaon","Thane","Tirora","Tuljapur","Tumsar","Uchgaon","Udgir","Umarga","Umarkhed","Umred","Uran","Uran Islampur","Vadgaon Kasba","Vaijapur","Vasai-Virar","Vita","Wadgaon Road","Wai","Wani","Wardha","Warora","Warud","Washim","Yavatmal","Yawal","Yevla"
		]],
		'MN' => ['state' => 'Manipur', 'cities' => [
			"Imphal","Lilong","Mayang Imphal","Thoubal"
		]],
		'ML' => ['state' => 'Meghalaya', 'cities' => ["Nongstoin","Shillong","Tura"]],
		'MZ' => ['state' => 'Mizoram', 'cities' => ["Aizawl","Lunglei","Saiha"]],
		'NL' => ['state' => 'Nagaland', 'cities' => ["Dimapur","Kohima","Mokokchung","Tuensang","Wokha","Zunheboto"]],
		'OR' => ['state' => 'Odisha', 'cities' => [
			"Balangir","Baleshwar Town","Barbil","Bargarh","Baripada Town","Bhadrak","Bhawanipatna","Bhubaneswar","Brahmapur","Byasanagar","Cuttack","Dhenkanal","Jatani","Jharsuguda","Kendrapara","Kendujhar","Malkangiri","Nabarangapur","Paradip","Parlakhemundi","Pattamundai","Phulabani","Puri","Rairangpur","Rajagangapur","Raurkela","Rayagada","Sambalpur","Soro","Sunabeda","Sundargarh","Talcher","Tarbha","Titlagarh"
		]],
		'PY' => ['state' => 'Puducherry', 'cities' => ["Karaikal","Mahe","Pondicherry","Yanam"]],
		'PB' => ['state' => 'Punjab', 'cities' => [
			"Amritsar","Barnala","Batala","Bathinda","Dhuri","Faridkot","Fazilka","Firozpur","Firozpur Cantt.","Gobindgarh","Gurdaspur","Hoshiarpur","Jagraon","Jalandhar Cantt.","Jalandhar","Kapurthala","Khanna","Kharar","Kot Kapura","Longowal","Ludhiana","Malerkotla","Malout","Mansa","Moga","Mohali","Morinda, India","Mukerian","Muktsar","Nabha","Nakodar","Nangal","Nawanshahr","Pathankot","Patiala","Pattran","Patti","Phagwara","Phillaur","Qadian","Raikot","Rajpura","Rampura Phul","Rupnagar","Samana","Sangrur","Sirhind Fatehgarh Sahib","Sujanpur","Sunam","Talwara","Tarn Taran","Urmar Tanda","Zira","Zirakpur"
		]],
		'RJ' => ['state' => 'Rajasthan', 'cities' => [
			"Ajmer","Alwar","Bikaner","Bharatpur","Bhilwara","Jaipur","Jodhpur","Lachhmangarh","Ladnu","Lakheri","Lalsot","Losal","Makrana","Malpura","Mandalgarh","Mandawa","Mangrol","Merta City","Mount Abu","Nadbai","Nagar","Nagaur","Nasirabad","Nathdwara","Neem-Ka-Thana","Nimbahera","Nohar","Nokha","Pali","Phalodi","Phulera","Pilani","Pilibanga","Pindwara","Pipar City","Prantij","Pratapgarh","Raisinghnagar","Rajakhera","Rajaldesar","Rajgarh (Alwar)","Rajgarh (Churu)","Rajsamand","Ramganj Mandi","Ramngarh","Ratangarh","Rawatbhata","Rawatsar","Reengus","Sadri","Sadulshahar","Sadulpur","Sagwara","Sambhar","Sanchore","Sangaria","Sardarshahar","Sawai Madhopur","Shahpura","Shahpura","Sheoganj","Sikar","Sirohi","Sojat","Sri Madhopur","Sujangarh","Sumerpur","Suratgarh","Taranagar","Todabhim","Todaraisingh","Tonk","Udaipur","Udaipurwati","Vijainagar, Ajmer"
		]],
		'SK' => ['state' => 'Sikkim', 'cities' => [
			'Gangtok', 'Gyalshing', 'Jorethang', 'Mangan', 'Namchi', 'Nayabazar', 'Rangpo', 'Rhenak', 'Singtam'
		]],
		'TN' => ['state' => 'Tamil Nadu', 'cities' => [
			"Arakkonam","Aruppukkottai","Chennai","Coimbatore","Erode","Gobichettipalayam","Kancheepuram","Karur","Lalgudi","Madurai","Manachanallur","Nagapattinam","Nagercoil","Namagiripettai","Namakkal","Nandivaram-Guduvancheri","Nanjikottai","Natham","Nellikuppam","Neyveli (TS)","O' Valley","Oddanchatram","P.N.Patti","Pacode","Padmanabhapuram","Palani","Palladam","Pallapatti","Pallikonda","Panagudi","Panruti","Paramakudi","Parangipettai","Pattukkottai","Perambalur","Peravurani","Periyakulam","Periyasemur","Pernampattu","Pollachi","Polur","Ponneri","Pudukkottai","Pudupattinam","Puliyankudi","Punjaipugalur","Ranipet","Rajapalayam","Ramanathapuram","Rameshwaram","Rasipuram","Salem","Sankarankoil","Sankari","Sathyamangalam","Sattur","Shenkottai","Sholavandan","Sholingur","Sirkali","Sivaganga","Sivagiri","Sivakasi","Srivilliputhur","Surandai","Suriyampalayam","Tenkasi","Thammampatti","Thanjavur","Tharamangalam","Tharangambadi","Theni Allinagaram","Thirumangalam","Thirupuvanam","Thiruthuraipoondi","Thiruvallur","Thiruvarur","Thuraiyur","Tindivanam","Tiruchendur","Tiruchengode","Tiruchirappalli","Tirukalukundram","Tirukkoyilur","Tirunelveli","Tirupathur","Tirupathur","Tiruppur","Tiruttani","Tiruvannamalai","Tiruvethipuram","Tittakudi","Udhagamandalam","Udumalaipettai","Unnamalaikadai","Usilampatti","Uthamapalayam","Uthiramerur","Vadakkuvalliyur","Vadalur","Vadipatti","Valparai","Vandavasi","Vaniyambadi","Vedaranyam","Vellakoil","Vellore","Vikramasingapuram","Viluppuram","Virudhachalam","Virudhunagar","Viswanatham"
		]],
		'TS' => ['state' => 'Telangana', 'cities' => [
			"Adilabad","Bellampalle","Bhadrachalam","Bhainsa","Bhongir","Bodhan","Farooqnagar","Gadwal","Hyderabad","Jagtial","Jangaon","Kagaznagar","Kamareddy","Karimnagar","Khammam","Koratla","Kothagudem","Kyathampalle","Mahbubnagar","Mancherial","Mandamarri","Manuguru","Medak","Miryalaguda","Nagarkurnool","Narayanpet","Nirmal","Nizamabad","Palwancha","Ramagundam","Sadasivpet","Sangareddy","Siddipet","Sircilla","Suryapet","Tandur","Vikarabad","Wanaparthy","Warangal","Yellandu"
		]],
		'TR' => ['state' => 'Tripura', 'cities' => [
			"Agartala","Belonia","Dharmanagar","Kailasahar","Khowai","Pratapgarh","Udaipur"
		]],
		'UK' => ['state' => 'Uttarakhand', 'cities' => [
			"Bageshwar","Dehradun","Haldwani-cum-Kathgodam","Hardwar","Kashipur","Manglaur","Mussoorie","Nagla","Nainital","Pauri","Pithoragarh","Ramnagar","Rishikesh","Roorkee","Rudrapur","Sitarganj","Srinagar","Tehri"
		]],
		'UP' => ['state' => 'Uttar Pradesh', 'cities' => [
			"Achhnera","Agra","Aligarh","Prayagraj","Amroha","Azamgarh","Bahraich","Chandausi","Etawah","Firozabad","Fatehpur Sikri","Hapur","Hardoi ","Jhansi","Kalpi","Kanpur","Khair","Laharpur","Lakhimpur","Lal Gopalganj Nindaura","Lalitpur","Lalganj","Lar","Loni","Lucknow","Mathura","Meerut","Modinagar","Moradabad","Nagina","Najibabad","Nakur","Nanpara","Naraura","Naugawan Sadat","Nautanwa","Nawabganj","Nehtaur","Niwai","Noida","Noorpur","Obra","Orai","Padrauna","Palia Kalan","Parasi","Phulpur","Pihani","Pilibhit","Pilkhuwa","Powayan","Pukhrayan","Puranpur","Purquazi","Purwa","Rae Bareli","Rampur","Rampur Maniharan","Rampur Maniharan","Rasra","Rath","Renukoot","Reoti","Robertsganj","Rudauli","Rudrapur","Sadabad","Safipur","Saharanpur","Sahaspur","Sahaswan","Sahawar","Sahjanwa","Saidpur","Sambhal","Samdhan","Samthar","Sandi","Sandila","Sardhana","Seohara","Shahabad, Hardoi","Shahabad, Rampur","Shahganj","Shahjahanpur","Shamli","Shamsabad, Agra","Shamsabad, Farrukhabad","Sherkot","Shikarpur, Bulandshahr","Shikohabad","Shishgarh","Siana","Sikanderpur","Sikandra Rao","Sikandrabad","Sirsaganj","Sirsi","Sitapur","Soron","Suar","Sultanpur","Sumerpur","Tanda","Thakurdwara","Thana Bhawan","Tilhar","Tirwaganj","Tulsipur","Tundla","Ujhani","Unnao","Utraula","Varanasi","Vrindavan","Warhapur","Zaidpur","Zamania"
		]],
		'WB' => ['state' => 'West Bengal', 'cities' => [
			"Adra","Alipurduar","Arambagh","Asansol","Baharampur","Balurghat","Bankura","Darjiling","English Bazar","Gangarampur","Habra","Hugli-Chinsurah","Jalpaiguri","Jhargram","Kalimpong","Kharagpur","Kolkata","Mainaguri","Malda","Mathabhanga","Medinipur","Memari","Monoharpur","Murshidabad","Nabadwip","Naihati","Panchla","Pandua","Paschim Punropara","Purulia","Raghunathpur","Raghunathganj","Raiganj","Rampurhat","Ranaghat","Sainthia","Santipur","Siliguri","Sonamukhi","Srirampore","Suri","Taki","Tamluk","Tarakeswar"
		]]
	];
}