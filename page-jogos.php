<?php get_header(); ?>

    <main>
        
        <section id="matches" class="pd-all">

            <div class="container container-small">
            
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center fw800 mb-5">
                            <span>Próximo Jogo</span>
                        </h2>
                    </div>
                </div>
				
				
				<!-- INICIO QUADRO JOGO -->
				
				
				<div class="card box-shadow">
					<div class="row no-gutters">

						<div class="col-md-2 col-3">
							<div class="date d-flex flex-column justify-content-center">
								<h2 class="text-uppercase fw800">21</h2>
								<h5 class="text-uppercase">mai</h5>
								<p class="text-uppercase fw800">sab</p>
							</div>
						</div>

						<div class="col-md-10 col-9">
							<div class="card-body">

								<p class="card-title">Copa ES 2022</p>
								<p class="card-match"><small class="text-muted">1ª Rodada</small></p>

								<div class="teams d-flex justify-content-between align-items-center">

									<div class="text-center">
										<img src="<?php bloginfo( 'template_url' ) ?>/assets/img/clubs/sport.png" class="club">
										<p class="team">Sport</p>
									</div>

									<h4 class="fw200 vs">x</h4>

									<div class="text-center">
										<img src="<?php bloginfo( 'template_url' ) ?>/assets/img/clubs/desportiva.png" class="club">
										<p class="team">Desportiva</p>
									</div>

								</div>

								<p class="card-hour"><strong class="text-muted">15h00</strong></p>
								<p class="card-local"><small class="text-muted">À definir</small></p>

							</div>
						</div>

					</div>
				</div>
				
				<!-- FIM QUADRO JOGO -->                

                <br>
				<br>
				<br>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center fw800 mb-5">
                            <span>Últimos Jogos</span>
                        </h4>
                    </div>
                </div>
                

                <?php require_once get_template_directory()."/pages/2022/copa-es.php"; ?>

            
            </div>

        </section>

    </main>

<?php get_footer(); ?>