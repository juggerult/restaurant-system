<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>carwash</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Syncopate:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet" type='text/css'>
    <link href="{{asset('main.css')}}" rel="stylesheet">
    <script src="{{asset('script.js')}}"></script>
</head>
<body>
    <div class="main-content">
        <div class="header-owerlays">
            <div class="containers" id="about-us">
                <div class="containerq">
            <h1>
                Restaurant
            </h1>
            <p>В каждом кулинарном шедевре мы воплощаем страсть к качеству — ваш вкус, наша гордость.</p>
            <form action="" method="get">
            <button type="submit">Заказать</button>
            </form>
                </div>
        </div>
        </div>
        <section class="fullwidth-section gray-section" id="about-us">
            <div class="containerq">
                <h1>
                    Menu
                </h1>
                <div class="class-row">
                    <div class="class">
                        <h2>Закуски</h2>
                        @foreach ($snacks as $snack)
                            <p class="menu">{{$snack->name}} <span>{{$snack->price}} грн</span><br><span style="font-size: 13px;">{{$snack->description}}</span></p>
                        @endforeach
                    </div>
                    <div class="class">
                        <h2>Основные</h2>
                        @foreach ($mains as $main)
                            <p class="menu">{{$main->name}} <span>{{$main->price}} грн</span><br><span style="font-size: 13px;">{{$main->description}}</span></p>
                        @endforeach
                    </div>
                    <div class="class">
                        <h2>Супы</h2>
                        @foreach ($soups as $soup)
                            <p class="menu">{{$soup->name}} <span>{{$soup->price}} грн</span><br><span style="font-size: 13px;">{{$soup->description}}</span></p>
                        @endforeach
                    </div>
                    <div class="class">
                        <h2>Десерты</h2>
                        @foreach ($desserts as $dessert)
                            <p class="menu">{{$dessert->name}} <span>{{$dessert->price}} грн</span><br><span style="font-size: 13px;">{{$dessert->description}}</span></p>
                        @endforeach
                    </div>
                </div>
            </div>
          <section class="fullwidth-section gray-section" id="about-us">
            <div class="containerq">
                <h1>
                    about us
                </h1>
              <div class="about-container">
                <div class="section-title-wrapper">
                  <p>This is who we are</p>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <p>
                        Талантливые шеф-повары с любовью создают блюда, вдохновленные сезонными продуктами и мировыми кулинарными традициями.
                        Наше меню — это симфония вкусов, в которой каждый ингредиент имеет значение. От изысканных закусок до великолепных десертов, мы предлагаем гастрономические наслаждения для каждого гостя.
                        Мы понимаем ценность вашего времени, поэтому обеспечиваем быстрое и качественное обслуживание. Наша команда работает над тем, чтобы сделать ваш визит приятным и незабываемым.
                        Приглашаем вас на уникальное кулинарное путешествие, где каждый прием пищи — это встреча с утонченным вкусом и наслаждением. В нашем ресторане мы создаем не просто блюда, а впечатления.</p>
                    <p>10+ Лет опыта</p>
                    <p>50+ Заказов выполняется и доставляется ежедневно</p>
                    <p>1000+ Счастливых клиентов</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <form action="" method="POST">
            @csrf
            <section class="fullwidth-section" id="about-us">
              <div class="section-inner">
                <div class="containerq">
                  <h1>
                    Contact
                  </h1>
                  <div class="section-title-wrapper">
                    <p class="section-subtitle">Не стесняйтесь спрашивать</p>
                  </div>
                  <div class="contact">
                    <div class="row">
                      <div class="col-md-4">
                        <input type="text" placeholder="Имя" id="name" name="name">
                      </div>
                      <div class="col-md-4">
                        <input type="text" placeholder="Номер телефона" id="phone_number" name="phone_number">
                      </div>
                      <div class="col-md-4">
                        <input type="text" placeholder="E-mail" id="email" name="email">
                      </div>
                    </div>
                    <textarea placeholder="Вопрос" rows="8" id="question" name="question"></textarea>
                    <button>Отправить</button>
                  </div>
                </div>
              </div>
            </section>
          </form>
        </section>
    </div>
</body>
</html>
