<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curabitur - Sobre</title>
    <link rel="icon" type="image/x-icon" href="images/logosite.png">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include_once('header.php');
    ?>   
    <main>
        <article>
            <section>
                <h5>Sobre o Instituto Curabitur</h5>
                <p>
                    Bem-vindo à página "Sobre" do Instituto Curabitur. Aqui, você encontrará
                    informações detalhadas sobre nossa organização e nossa missão de combater
                    a malária.
                </p>
                <h5 class="centraliza">Imagens da Nossa Equipe</h5>
                <div class="d-flex justify-content-center">
                    <div id="carouselExampleControls" class="carousel slide w-50" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="images/c001.jpg" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="images/c002.jpg" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="images/c003.jpg" alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only"></span>
                        </a>
                      </div>
                </div>
            </section>
            <section>
                <h4>Quem Somos</h4>
                <p>
                    O Instituto Curabitur é uma organização sem fins lucrativos dedicada a educar 
                    as pessoas sobre a malária e a contribuir para sua prevenção e tratamento. Fundado 
                    em 2005 por um grupo de profissionais de saúde comprometidos, nosso instituto 
                    rapidamente se tornou uma voz ativa na luta contra essa doença devastadora.
                </p>
            </section>
            <section>
                <h4>Nossa Missão</h4>
                <p>
                    Nossa missão é clara: trabalhar incansavelmente para reduzir a incidência da 
                    malária e salvar vidas. Acreditamos que a educação é a chave para a prevenção, 
                    e é por isso que nos dedicamos a fornecer informações precisas e atualizadas sobre 
                    a malária.
                </p>
            </section>
            <section>
                <h4>Nossa História</h4>
                <p>
                    O Instituto Curabitur teve suas raízes em um esforço de conscientização local sobre a 
                    malária em uma comunidade afetada. À medida que percebemos a magnitude do problema e 
                    o impacto devastador da malária em tantas vidas, decidimos expandir nossos esforços e 
                    estabelecer uma organização formal.
                </p>
                <p>
                    Desde então, temos colaborado com governos, organizações de saúde e comunidades em 
                    todo o mundo para implementar programas de prevenção, fornecer recursos e treinar 
                    profissionais de saúde locais. Nossa equipe é composta por especialistas em malária, 
                    médicos, cientistas e voluntários dedicados, todos unidos por um objetivo comum: 
                    eliminar a malária.
                </p>
            </section>
            <section>
                <h4>Nossas Conquistas</h4>
                <p>Ao longo dos anos, alcançamos várias conquistas notáveis na luta contra a malária. 
                    Algumas de nossas realizações incluem:
                </p>
                <ul>
                    <li><p>
                        Distribuição de milhares de mosquiteiros tratados com inseticidas em áreas de alto risco.
                    </p></li>
                    <li><p>
                        Treinamento de profissionais de saúde locais em diagnóstico e tratamento eficaz da malária.
                    </p></li>
                    <li><p>
                        Campanhas de conscientização em escolas e comunidades para educar as pessoas sobre a prevenção da malária.
                    </p></li>
                </ul>
            </section>
            <section>
                <h4>Nosso Compromisso Futuro</h4>
                <p>O Instituto Curabitur está comprometido em continuar sua missão de combater a 
                    malária. Planejamos expandir nossos esforços, aumentar a conscientização e 
                    colaborar com outras organizações e agências governamentais para alcançar nosso 
                    objetivo de um mundo livre da malária.
                </p>
            </section>
            <section>
                <h4>Contato</h4>
                <p>
                    Se você deseja saber mais sobre o Instituto Curabitur, entre em contato conosco. 
                    Estamos sempre abertos a parcerias, voluntários e contribuições para apoiar nossa causa.
                </p>
                <p>
                    E-mail: contato@institutocurabitur.org <br>
                    Telefone: +1 (555) 123-4567
                </p>
                <p>
                    Acesse nossa <a href="contact.php">página de contato</a> também para mais dúvidas ou sugestões, ou caso queira avisar sobre focos do mosquito.
                    Estamos ansiosos para trabalhar juntos na luta contra a malária e criar um futuro mais saudável para todos.
                </p>
            </section>
        </article>
    </main>
    <?php
        include_once('footer.php');
    ?>
    
</body>
</html>