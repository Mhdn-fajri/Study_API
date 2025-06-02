<?php
function get_Curl($url)

{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_Curl("https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC41mWdykS0pPWIh9hrObAaQ&key=AIzaSyAP6FJpuxgUr7oEfu0Odxh2ndDJarLyw9Y");

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['default']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

//latest video
$urlLatestVideo = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyAP6FJpuxgUr7oEfu0Odxh2ndDJarLyw9Y&channelId=UC41mWdykS0pPWIh9hrObAaQ&maxResults=1&order=date&part=snippet";
$result = get_Curl($urlLatestVideo);
$latestVideoId = $result['items'][0]['id']['videoId'];

//instagram API
$result2 = get_Curl("https://graph.instagram.com/me?fields=username,profile_picture_url,followers_count&access_token=IGAAJuFrKU3ptBZAE5UbHotR3cwSUk4WmdyZAHNHSmQ2eDcxSUljYWo5WHNOZAjY2V3ZAJLXVYZAnh0SG1EVlE1SWljSzNTeTdqaUMyUFR0VHBKSzVXTjU5NFR3VkFPNGhnOWNtNThnV096b2JOU29HVEgzM1RZAeEFIX2psaW15eFVabwZDZD");

$usernameIG = $result2['username'];
$profilePictureIG = $result2['profile_picture_url'];
$followersIG = $result2['followers_count'];

//Postingan IG
$mediaResult = get_CURL('https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,permalink,timestamp,username&access_token=IGAAJuFrKU3ptBZAE5UbHotR3cwSUk4WmdyZAHNHSmQ2eDcxSUljYWo5WHNOZAjY2V3ZAJLXVYZAnh0SG1EVlE1SWljSzNTeTdqaUMyUFR0VHBKSzVXTjU5NFR3VkFPNGhnOWNtNThnV096b2JOU29HVEgzM1RZAeEFIX2psaW15eFVabwZDZD');

$igMedia = array_slice($mediaResult['data'], 0, 3);



?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

  <title>My Portfolio</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">Muhammad Nurul Fajri</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#portfolio">Portfolio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="jumbotron" id="home">
    <div class="container">
      <div class="text-center">
        <img src="img/profile1.jpg" class="rounded-circle img-thumbnail">
        <h1 class="display-4">Muhammad Nurul Fajri</h1>
        <h3 class="lead">Lecturer | Programmer | Desainer</h3>
      </div>
    </div>
  </div>


  <!-- About -->
  <section class="about" id="about">
    <div class="container">
      <div class="row mb-4">
        <div class="col text-center">
          <h2>About</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5">
          <p>I am a creative professional with experience in web development, graphic design, videography, photography, and social media specialization. Combining technical skills and visual creativity, I help clients and businesses build a strong digital identity and create engaging content. As a web developer, I design and develop responsive and functional websites. As a graphic designer, I create visually compelling and communicative materials. Through my videography and photography skills, I capture valuable moments and produce storytelling videos. As a social media specialist, I manage content strategies to enhance brand presence across various platforms. My diverse expertise makes me a valuable partner for your digital and creative projects. I am committed to delivering high-quality work that not only meets but exceeds expectations.</p>
        </div>
        <div class="col-md-5">
          <p>Saya adalah seorang profesional kreatif dengan pengalaman dalam web development, desain grafis, videografi, fotografi, dan spesialisasi di media sosial. Dengan kombinasi keterampilan teknis dan kreativitas visual, saya membantu klien dan bisnis menciptakan identitas digital yang kuat serta menghasilkan konten yang menarik. Dalam peran saya sebagai web developer, saya merancang dan mengembangkan situs web yang responsif dan fungsional. Sebagai desainer grafis, saya menciptakan materi visual yang komunikatif dan menarik. Dengan kemampuan videografi dan fotografi, saya menangkap momen berharga serta menghasilkan video yang bercerita. Sebagai spesialis media sosial, saya mengelola strategi konten untuk meningkatkan kehadiran merek di berbagai platform. Keahlian saya yang beragam menjadikan saya mitra yang tepat untuk proyek digital dan kreatif Anda. Saya berkomitmen untuk menghasilkan karya berkualitas tinggi yang tidak hanya memenuhi, tetapi melampaui ekspektasi.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Youtube & IG -->
  <section class="social bg-light" id="social">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Social Media</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="row">
            <div class="col md-4">
              <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
            </div>
            <div class="col-md-8">
              <h5><?= $channelName; ?></h5>
              <p><?= $subscriber; ?> Subscriber.</p>
              <div class="g-ytsubscribe" data-channelid="UC41mWdykS0pPWIh9hrObAaQ" data-layout="default" data-count="default"></div>
            </div>
          </div>
          <div class="row mt-3 pb-3">
            <div class="col">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId; ?>" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="row">
            <div class="col md-4">
              <img src="<?= $profilePictureIG; ?>" width="200" class="rounded-circle img-thumbnail">
            </div>
            <div class="col-md-8">
              <h5><?= $usernameIG ?></h5>
              <p><?= $followersIG ?> Followers.</p>
            </div>
          </div>
          <div class="row pt-3 mb-3">
            <div class="col">
              <?php foreach ($igMedia as $media): ?>
                <div class="ig-thumbnail" style="display:inline-block; margin-right:10px;">
                  <a href="<?= $media['permalink']; ?>" target="_blank">
                    <img src="<?= $media['media_url']; ?>" width="100">
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- Portfolio -->
  <section class="portfolio" id="portfolio">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Portfolio</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/1.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Contact -->
  <section class="contact bg-light" id="contact">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Contact</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="card bg-primary text-white mb-4 text-center">
            <div class="card-body">
              <h5 class="card-title">Contact Me</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>

          <ul class="list-group mb-4">
            <li class="list-group-item">
              <h3>Location</h3>
            </li>
            <li class="list-group-item">My Office</li>
            <li class="list-group-item">Jl. Setiabudhi No. 193, Bandung</li>
            <li class="list-group-item">West Java, Indonesia</li>
          </ul>
        </div>

        <div class="col-lg-6">

          <form>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary">Send Message</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>


  <!-- footer -->
  <footer class="bg-dark text-white mt-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p>Copyright &copy; 2018.</p>
        </div>
      </div>
    </div>
  </footer>







  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>