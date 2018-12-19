<?php				

				$cont = 0;	
				if(count($boloes) > 0){								
					for($i = 0; $i < count($boloes); $i += 3){
						if($boloes[$i]->getCampeonato() == $_SESSION['modalidade']){
							$cont += 1;
							if($cont == 1){
								echo '<div class="container">
									<div class="row">';
										

										if($_SESSION['status'] == 1){
											echo '<div class="col-4 offset-1 alert alert-danger">
												  Senha incorreta.
												</div>
												<div class="col-4 offset-3">
											<input class="filterBolao" type="text" placeholder="Buscar Bolão por Nome..." id="filterBolao" name="filterBolao">
										</div>';
										} elseif($_SESSION['status'] == 2){
											echo '<div class="col-4 offset-1 alert alert-danger">
												  Limite de participantes atingido.
												</div>
												<div class="col-4 offset-3">
											<input class="filterBolao" type="text" placeholder="Buscar Bolão por Nome..." id="filterBolao" name="filterBolao">
										</div>';
										} elseif($_SESSION['status'] == 3){
											echo '<div class="col-4 offset-1 alert alert-success">
												  Aposta realizada com sucesso!
												</div>
												<div class="col-4 offset-3">
											<input class="filterBolao" type="text" placeholder="Buscar Bolão por Nome..." id="filterBolao" name="filterBolao">
										</div>';
										} else {
											echo '<div class="col-4"></div>
											<div class="col-4 offset-4">
											<input class="filterBolao" type="text" placeholder="Buscar Bolão por Nome..." id="filterBolao" name="filterBolao">
										</div>';
										}
										$_SESSION['status'] = -1;

										echo '
										<div class="col-1"></div>
									</div>
								</div>					
									<div id="carousel-noticias" class="carousel slide" data-ride="carousel">
								    	<div class="row">		
								    		<div class="col-1">		    		
												<a class="carousel-control-prev" href="#carousel-noticias" data-slide="prev"><i class="fas fa-chevron-left" style="color: #A9A9A9; font-size: 2.5em;"></i></a>
											</div>
											<div class="col-10">
												<div class="carousel-inner">';
												echo '<div class="carousel-item active">';
							} else {
												echo '<div class="carousel-item">';
							}
													echo '<div class="row">';
							for($j = $i; $j < $i+3; $j++){
								if($j < count($boloes)){
														echo '<div class="col-4"><div class="card"><div class="card-header" style="background-color: #FA8072"><div class="row"><div class="col-2">';
									if(intval($boloes[$j]->getTipo()) == 0){
										echo '<i class="fas fa-users py-2" data-toggle="tooltip" title="Público" data-placement="bottom"></i>';
									}

									echo '</div><div class="col-10"><h3 class="titulo">' . $boloes[$j]->getTitulo() . '</h3></div></div></div><div class="card-body" style="background-color: #FFDAB9"><h6><strong>Descrição</strong></h6><p>' . $boloes[$j]->getDescricao() . '</p><h6><strong>Participantes</strong></h6><p>' . count($boloes[$j]->getParticipantes()) . '/' . $boloes[$j]->getLimiteDeParticipantes() . '</p><h6><strong>Data de Término</strong></h6><p>' . $boloes[$j]->getTempoLimite() . '</p><span data-target="#apostarB' . $boloes[$j]->getId() . '" data-toggle="modal"><button class="btn btn-danger" data-placement="bottom" data-toggle="tooltip" title="Apostar" onclick="<?php ' . $_SESSION['bolao'] = $j . ';?>"><i class="fas fa-user-plus"></i></button></span><button data-target="#B'. $boloes[$j]->getId() . '" data-toggle="modal" class="btn btn-info"><i class="far fa-eye"></i></button>
				    					</div></div></div>';
								}
							}
							echo '</div></div>';
							echo '</div>
						</div>
						<div class="col-1">
							<a class="carousel-control-next" href="#carousel-noticias" data-slide="next"><i class="fas fa-chevron-right" style="color: #A9A9A9; font-size: 2.5em;"></i></a>	
						</div>
					</div>
				</div>';	
						}
					}		
				}								    		
				if($cont == 0 && count($boloes) == 0){
					echo '<h3 class="text-center">Não há bolões disponíveis</h3>';
				}
									
			?>