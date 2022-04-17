<?php get_header(); 

the_post();
$post_response = apply_filters( 'send_contact_form', false );
?>

    <main>
        
        <section id="page" class="pd-all">
            <div class="container container-small">

                <?php if( $post_response ) : ?>
                    <div class="alert alert-<?php echo $post_response->status ?> alert-dismissible fade show" role="alert">
                        <?php echo $post_response->message ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="fw800">
                            <span>Crie Oportunidades Para Sua Marca</span>
                        </h2>

                        <p class="text-justify">
                            A Associação Desportiva Ferroviária busca gerar receitas alternativas ao futebol. Para isso, o Departamento Comercial garante retorno de imagem para o Clube e para as empresas parceiras.
                        </p>
                        <p class="text-justify">
                            Além de patrocínios, o Departamento Comercial negocia as taxas de licenciamento de produtos, publicidades no estádio e nos jogos da equipe, anúncios e diversas outras propriedades comerciais que podem ser criadas em conjunto.
                            <br>
                            A Desportiva ainda oferece outros produtos para seus parceiros, aumentando assim as possibilidades de relação comercial com outras marcas:
                        </p>
                        <p class="text-justify">
                            <strong>Locação de espaços:</strong>
                            <br>
                            Estádio, Ginásio, Salão Social e outras dependências
                            <br>
                            <strong>Mídia Kit:</strong>
                            <br>
                            Anuncio em nosso portal de notícias e em nossas mídias sociais
                            <br>
                            <strong>Brindes cooperados:</strong>
                            <br>
                            Distribuição de brindes de empresas associadas em ações e eventos
                            <br>
                            <strong>Revista e boletins:</strong>
                            <br>
                            Anúncios ou reportagens sobre parceiros
                        </p>
                        <p class="text-justify p-0">
                            Associar-se ao maior clube do estado do Espírito Santo é certeza de um bom negócio, uma vez que nossa marca é reconhecida nacionalmente, e nossa torcida está sempre ao nosso lado.
                        </p>

                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="fw800">
                            <span>Entre em contato</span>
                        </h2>
                        
                        <form action="<?php echo get_permalink() ?>" method="post">
                            <div class="form-group">
                                <label for="field-name">Nome</label>
                                <input class="form-control" type="text" name="field_name" id="field-name" placeholder="Nome" required />
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="field-phone">Celular</label>
                                    <input class="form-control" type="phone" name="field_phone" id="field-phone" placeholder="(27) 00000-0000" required />
                                </div>
                                <div class="form-group col">
                                    <label for="field-email">E-mail</label>
                                    <input class="form-control" type="email" name="field_email" id="field-email" placeholder="E-mail" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-subject">Assunto</label>
                                <input class="form-control" type="text" name="field_subject" id="field-subject" placeholder="Assunto" class="[ input-text ] contact-form__list-item__input" />
                            </div>
                            <div class="form-group">
                                <label for="field-message">Mensagem</label>
                                <textarea class="form-control" name="field_message" id="field-message" cols="30" rows="6" placeholder="Mensagem"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-gold" type="submit">Enviar</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </section>

    </main>

<?php get_footer(); ?>