@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<span class="panel-title">Wizards</span>
				</div>
				<div class="panel-body">
					<div class="wizard ui-wizard-example">
						<div class="wizard-wrapper">
							<ul class="wizard-steps">
								<li data-target="#wizard-example-step1" >
									<span class="wizard-step-number">1</span>
									<span class="wizard-step-caption">
										Step 1
										<span class="wizard-step-description">First step description</span>
									</span>
								</li
								><li data-target="#wizard-example-step2">
									<span class="wizard-step-number">2</span>
									<span class="wizard-step-caption">
										Step 2
										<span class="wizard-step-description">Second step description</span>
									</span>
								</li
								><li data-target="#wizard-example-step3">
									<span class="wizard-step-number">3</span>
									<span class="wizard-step-caption">
										Step 3
										<span class="wizard-step-description">Third step with long description. Lorem ipsum dolor sit amet</span>
									</span>
								</li
								><li data-target="#wizard-example-step4">
									<span class="wizard-step-number">4</span>
									<span class="wizard-step-caption">
										Finish
									</span>
								</li>
							</ul>
						</div>
						<div class="wizard-content panel">
							<div class="wizard-pane" id="wizard-example-step1">
								This is step 1<br><br>
								<button class="btn btn-primary wizard-next-step-btn">Next</button>
							</div>
							<div class="wizard-pane" id="wizard-example-step2" style="display: none;">
								This is step 2<br><br>
								<button class="btn wizard-prev-step-btn">Prev</button>
								<button class="btn btn-primary wizard-next-step-btn">Next</button>
							</div>
							<div class="wizard-pane" id="wizard-example-step3" style="display: none;">
								This is step 3<br><br>
								<button class="btn wizard-prev-step-btn">Prev</button>
								<button class="btn btn-primary wizard-next-step-btn">Next</button>
							</div>
							<div class="wizard-pane" id="wizard-example-step4" style="display: none;">
								Finish<br><br>
								<button class="btn wizard-prev-step-btn">Prev</button>
								<button class="btn btn-success wizard-go-to-step-btn">Go to Step 2</button>
								<button class="btn btn-primary wizard-next-step-btn">Finish</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="ui-wizard-modal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="wizard ui-wizard-example">
							<div class="wizard-wrapper">
								<ul class="wizard-steps">
									<li data-target="#wizard-example-step21" >
										<span class="wizard-step-number">1</span>
										<span class="wizard-step-caption">
											Step 1
											<span class="wizard-step-description">First step description</span>
										</span>
									</li
									><li data-target="#wizard-example-step22">
										<span class="wizard-step-number">2</span>
										<span class="wizard-step-caption">
											Step 2
											<span class="wizard-step-description">Second step description</span>
										</span>
									</li
									><li data-target="#wizard-example-step23">
										<span class="wizard-step-number">3</span>
										<span class="wizard-step-caption">
											Step 3
											<span class="wizard-step-description">Third step description</span>
										</span>
									</li
									><li data-target="#wizard-example-step24">
										<span class="wizard-step-number">4</span>
										<span class="wizard-step-caption">
											Finish
										</span>
									</li>
								</ul>
							</div>
							<div class="wizard-content">
								<div class="wizard-pane" id="wizard-example-step21">
									This is step 1<br><br>
									<button class="btn btn-primary wizard-next-step-btn">Next</button>
								</div>
								<div class="wizard-pane" id="wizard-example-step22">
									This is step 2<br><br>
									<button class="btn wizard-prev-step-btn">Prev</button>
									<button class="btn btn-primary wizard-next-step-btn">Next</button>
								</div>
								<div class="wizard-pane" id="wizard-example-step23">
									This is step 3<br><br>
									<button class="btn wizard-prev-step-btn">Prev</button>
									<button class="btn btn-primary wizard-next-step-btn">Next</button>
								</div>
								<div class="wizard-pane" id="wizard-example-step24">
									Finish<br><br>
									<button class="btn wizard-prev-step-btn">Prev</button>
									<button class="btn btn-success wizard-go-to-step-btn">Go to Step 2</button>
									<button class="btn btn-primary wizard-next-step-btn">Finish</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="panel">
				<div class="panel-heading">
					<span class="panel-title">Wizard in modal</span>
				</div>
				<div class="panel-body">
					<button class="btn btn-info" data-toggle="modal" data-target="#ui-wizard-modal">Launch modal with wizard</button>
				</div>
			</div>


		</div>
	</div>

</div>
@endsection
