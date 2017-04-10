@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Switchers</span>
                </div>
                <div class="panel-body">

                    <h4>Ti-Ta-Toggle <small>awesomenes</small></h4>
                    <p>
                        Just by adding one <code>&lt;span&gt;</code> plus the class <code>.checkbox-slider--TYPE</code> you get this result:
                    </p>

                    <!-- <div class="panel-heading">
                    <h3 class="panel-title">examples</h3>
                </div> -->

                    <div class="checkbox checkbox-slider--default">
                        <label>
                            <input type="checkbox"><span>TiTaToggle</span>
                        </label>
                    </div>


                    <div class="highlight"><pre><code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">&quot;checkbox checkbox-slider--default&quot;</span><span class="nt">&gt;</span>
			<span class="nt">&lt;label&gt;</span>
			<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">&quot;checkbox&quot;</span><span class="nt">&gt;&lt;span&gt;</span>TiTaToggle<span class="nt">&lt;/span&gt;</span>
			<span class="nt">&lt;/label&gt;</span>
			<span class="nt">&lt;/div&gt;</span></code></pre></div>



                    <div class="alert alert-danger">
                        <p>
                        <h4>Note:</h4>
                        <p>
                            Don't forget to add the <code>span</code> after the <code>input</code>
                        </p>
                        </p>
                    </div>
                    <hr>

                    <h3 id="default">Slider default <small>checkbox-slider--default</small></h3>
                    <p>
                        Out of the box this would be the modest version, without any bells and whistles.
                    </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Default</h5>
                            <div class="checkbox checkbox-slider--default">
                                <label>
                                    <input type="checkbox"><span>default</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--default">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--default">
                                <label>
                                    <input type="checkbox" disabled><span>disabled</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--default">
                                <label>
                                    <input type="checkbox" checked disabled><span>disabled checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Small</h5>
                            <div class="checkbox checkbox-slider--default checkbox-slider-sm">
                                <label>
                                    <input type="checkbox"><span>small</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--default checkbox-slider-sm">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Medium</h5>
                            <div class="checkbox checkbox-slider--default checkbox-slider-md">
                                <label>
                                    <input type="checkbox"><span>medium</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--default checkbox-slider-md">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Large</h5>
                            <div class="checkbox checkbox-slider--default checkbox-slider-lg">
                                <label>
                                    <input type="checkbox"><span>large</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--default checkbox-slider-lg">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                    </div>





                    <div class="highlight"><pre><code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">&quot;... checkbox-slider--default&quot;</span><span class="nt">&gt;</span>
				...
				<span class="nt">&lt;/div&gt;</span></code></pre></div>

                    <h4 id="b">Slider Default rounded <small>checkbox-slider--a-rounded</small></h4>
                    <p>
                        It takes the edge off.
                    </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Default</h5>
                            <div class="checkbox checkbox-slider--a-rounded">
                                <label>
                                    <input type="checkbox"><span>Default</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a-rounded">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a-rounded">
                                <label>
                                    <input type="checkbox" disabled><span>disabled</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a-rounded">
                                <label>
                                    <input type="checkbox" disabled checked><span>disabled checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Small</h5>
                            <div class="checkbox checkbox-slider--a-rounded checkbox-slider-sm">
                                <label>
                                    <input type="checkbox"><span>small</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a-rounded checkbox-slider-sm">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Medium</h5>
                            <div class="checkbox checkbox-slider--a-rounded checkbox-slider-md">
                                <label>
                                    <input type="checkbox"><span>medium</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a-rounded checkbox-slider-md">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Large</h5>
                            <div class="checkbox checkbox-slider--a-rounded checkbox-slider-lg">
                                <label>
                                    <input type="checkbox"><span>large</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a-rounded checkbox-slider-lg">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                    </div>





                    <div class="highlight"><pre><code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">&quot;... checkbox-slider--a-rounded&quot;</span><span class="nt">&gt;</span>
					...
					<span class="nt">&lt;/div&gt;</span></code></pre></div>

                    <h3 id="a">Slider A <small>checkbox-slider--a</small></h3>
                    <p>
                        Sometimes you need some text to double the meaning / state of the checkbox.
                        I've noticed many people have trouble with a checkbox, when it's "On" of "Off". To make
                        this more clear, you can use this version.
                    </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Default</h5>
                            <div class="checkbox checkbox-slider--a">
                                <label>
                                    <input type="checkbox"><span>Slider a</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a">
                                <label>
                                    <input type="checkbox" disabled><span>disabled</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a">
                                <label>
                                    <input type="checkbox" checked disabled><span>disabled checked </span>
                                </label>
                            </div>

                        </div>
                        <div class="col-sm-3">
                            <h5>Small</h5>
                            <div class="checkbox checkbox-slider--a checkbox-slider-sm">
                                <label>
                                    <input type="checkbox"><span>small</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a checkbox-slider-sm">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Medium</h5>
                            <div class="checkbox checkbox-slider--a checkbox-slider-md">
                                <label>
                                    <input type="checkbox"><span>medium</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a checkbox-slider-md">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Large</h5>
                            <div class="checkbox checkbox-slider--a checkbox-slider-lg">
                                <label>
                                    <input type="checkbox"><span>large</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--a checkbox-slider-lg">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="highlight"><pre><code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">&quot;... checkbox-slider--a&quot;</span><span class="nt">&gt;</span>
						...
						<span class="nt">&lt;/div&gt;</span></code></pre></div>

                    <h3 id="b">Slider B <small>checkbox-slider--b</small></h3>
                    <p>
                        An iOS like version of just a plain checkbox.
                    </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Default</h5>
                            <div class="checkbox checkbox-slider--b">
                                <label>
                                    <input type="checkbox"><span>Default</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b">
                                <label>
                                    <input type="checkbox" disabled><span>disabled</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b">
                                <label>
                                    <input type="checkbox" disabled checked><span>disabled checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Small</h5>
                            <div class="checkbox checkbox-slider--b checkbox-slider-sm">
                                <label>
                                    <input type="checkbox"><span>small</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b checkbox-slider-sm">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Medium</h5>
                            <div class="checkbox checkbox-slider--b checkbox-slider-md">
                                <label>
                                    <input type="checkbox"><span>medium</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b checkbox-slider-md">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Large</h5>
                            <div class="checkbox checkbox-slider--b checkbox-slider-lg">
                                <label>
                                    <input type="checkbox"><span>large</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b checkbox-slider-lg">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                    </div>





                    <div class="highlight"><pre><code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">&quot;... checkbox-slider--b&quot;</span><span class="nt">&gt;</span>
							...
							<span class="nt">&lt;/div&gt;</span></code></pre></div>

                    <h4 id="b">Slider B Flat <small>checkbox-slider--b-flat</small></h4>
                    <p>
                        Just flat, it seems to be very fashionable. We just wait until the bevel is back.
                    </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Default</h5>
                            <div class="checkbox checkbox-slider--b-flat">
                                <label>
                                    <input type="checkbox"><span>Default</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b-flat">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b-flat">
                                <label>
                                    <input type="checkbox" disabled><span>disabled</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b-flat">
                                <label>
                                    <input type="checkbox" disabled checked><span>disabled checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Small</h5>
                            <div class="checkbox checkbox-slider--b-flat checkbox-slider-sm">
                                <label>
                                    <input type="checkbox"><span>small</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b-flat checkbox-slider-sm">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Medium</h5>
                            <div class="checkbox checkbox-slider--b-flat checkbox-slider-md">
                                <label>
                                    <input type="checkbox"><span>medium</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b-flat checkbox-slider-md">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Large</h5>
                            <div class="checkbox checkbox-slider--b-flat checkbox-slider-lg">
                                <label>
                                    <input type="checkbox"><span>large</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--b-flat checkbox-slider-lg">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                    </div>





                    <div class="highlight"><pre><code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">&quot;... checkbox-slider--b-flat&quot;</span><span class="nt">&gt;</span>
								...
								<span class="nt">&lt;/div&gt;</span></code></pre></div>

                    <h3 id="c">Slider C <small>checkbox-slider--c</small></h3>
                    <p>
                        Inspired by the Google material toggle boxes. And again this is just plain Bootstrap 3.
                    </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Default</h5>
                            <div class="checkbox checkbox-slider--c">
                                <label>
                                    <input type="checkbox"><span>Default</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c">
                                <label>
                                    <input type="checkbox" disabled><span>disabled</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c">
                                <label>
                                    <input type="checkbox" checked disabled><span>disabled checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Small</h5>
                            <div class="checkbox checkbox-slider--c checkbox-slider-sm">
                                <label>
                                    <input type="checkbox"><span>small</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c checkbox-slider-sm">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Medium</h5>
                            <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                <label>
                                    <input type="checkbox"><span>medium</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Large</h5>
                            <div class="checkbox checkbox-slider--c checkbox-slider-lg">
                                <label>
                                    <input type="checkbox"><span>large</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c checkbox-slider-lg">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                    </div>




                    <div class="highlight"><pre><code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">&quot;... checkbox-slider--c&quot;</span><span class="nt">&gt;</span>
									...
									<span class="nt">&lt;/div&gt;</span></code></pre></div>

                    <h4 id="c">Slider C Weight <small>checkbox-slider--c-weight</small></h4>
                    <p>
                        Giving the slider some more weight.
                    </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Default</h5>
                            <div class="checkbox checkbox-slider--c-weight">
                                <label>
                                    <input type="checkbox"><span>Default</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c-weight">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c-weight">
                                <label>
                                    <input type="checkbox" disabled><span>disabled</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c-weight">
                                <label>
                                    <input type="checkbox" checked disabled><span>disabled checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Small</h5>
                            <div class="checkbox checkbox-slider--c-weight checkbox-slider-sm">
                                <label>
                                    <input type="checkbox"><span>small</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c-weight checkbox-slider-sm">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Medium</h5>
                            <div class="checkbox checkbox-slider--c-weight checkbox-slider-md">
                                <label>
                                    <input type="checkbox"><span>medium</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c-weight checkbox-slider-md">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Large</h5>
                            <div class="checkbox checkbox-slider--c-weight checkbox-slider-lg">
                                <label>
                                    <input type="checkbox"><span>large</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-slider--c-weight checkbox-slider-lg">
                                <label>
                                    <input type="checkbox" checked><span>checked</span>
                                </label>
                            </div>
                        </div>
                    </div>




                    <div class="highlight"><pre><code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">&quot;... checkbox-slider--c-weight&quot;</span><span class="nt">&gt;</span>
										...
										<span class="nt">&lt;/div&gt;</span></code></pre></div>

                    <h3 id="sizes">Sizes</h3>
                    <p class="lead">
                        Propper sizing option should get the pony over the hill for your next project.
                    </p>
                    <p>

                        Next to the default size there are 3 sizes:
                    <ul>
                        <li>checkbox-slider-sm</li>
                        <li>checkbox-slider-md</li>
                        <li>checkbox-slider-lg</li>
                    </ul>
                    Just like Bootstrap. In the case you need something special, use the <code>_titatoggle.less</code>
                    to alther your preferend settings and sizes.
                    </p>

                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Default</h5>
                            <div class="checkbox checkbox-slider--default">
                                <label>
                                    <input type="checkbox"><span>Check me</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Small</h5>
                            <div class="checkbox checkbox-slider--default checkbox-slider-sm">
                                <label>
                                    <input type="checkbox"><span>Check me</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Medium</h5>
                            <div class="checkbox checkbox-slider--default checkbox-slider-md">
                                <label>
                                    <input type="checkbox"><span>Check me</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h5>Large</h5>
                            <div class="checkbox checkbox-slider--default checkbox-slider-lg">
                                <label>
                                    <input type="checkbox"><span>Check me</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <h3 id="indicator">Indicator</h3>
                    <p class="lead">
                        Small visual que for the label to show that the checkbox is checked.
                    </p>
                    <div class="alert alert-warning">
                        Not so usable for the visually impaired, due
                        to the fact it's only a color and contrast is to low.
                    </div>
                    <div class="checkbox checkbox-slider--default">
                        <label>
                            <input type="checkbox" checked><span class="indicator-success">success</span>
                        </label>
                    </div>
                    <div class="checkbox checkbox-slider--default">
                        <label>
                            <input type="checkbox" checked><span class="indicator-info">info</span>
                        </label>
                    </div>
                    <div class="checkbox checkbox-slider--default">
                        <label>
                            <input type="checkbox" checked><span class="indicator-warning">warning</span>
                        </label>
                    </div>
                    <div class="checkbox checkbox-slider--default">
                        <label>
                            <input type="checkbox" checked><span class="indicator-danger">danger</span>
                        </label>
                    </div>


                    <hr>

                    <h3 id="variations">Variations</h3>
                    <p class="lead">
                        Checkboxes can have different colors, just like buttons.
                    </p>
                    <p>
                        We use the default Bootstrap variables <code>@brand-XXX</code> to color the checkbox.
                    </p>
                    <div class="alert alert-warning">
                        Not so usable for the visually impaired, due
                        to the fact it's only a color and contrast is to low. And keep in mind that colorblindness is a real fact.
                    </div>
                    <div class="col-md-3">
                        <h5>Default</h5>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--default">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--a">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--b">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--b-flat">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--c">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--c-weight">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <h5>Info</h5>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--default checkbox-slider-info">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--a  checkbox-slider-info">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--b  checkbox-slider-info">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--b-flat  checkbox-slider-info">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--c  checkbox-slider-info">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--c-weight  checkbox-slider-info">
                            <label>
                                <input type="checkbox" checked><span>info</span>
                            </label>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <h5>Danger</h5>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--default checkbox-slider-danger">
                            <label>
                                <input type="checkbox" checked><span>danger</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--a  checkbox-slider-danger">
                            <label>
                                <input type="checkbox" checked><span>danger</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--b checkbox-slider-danger">
                            <label>
                                <input type="checkbox" checked><span>danger</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--b-flat checkbox-slider-danger">
                            <label>
                                <input type="checkbox" checked><span>danger</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--c  checkbox-slider-danger">
                            <label>
                                <input type="checkbox" checked><span>danger</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--c-weight  checkbox-slider-danger">
                            <label>
                                <input type="checkbox" checked><span>danger</span>
                            </label>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <h5>Warning</h5>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--default checkbox-slider-warning">
                            <label>
                                <input type="checkbox" checked><span>warning</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--a  checkbox-slider-warning">
                            <label>
                                <input type="checkbox" checked><span>warning</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--b checkbox-slider-warning">
                            <label>
                                <input type="checkbox" checked><span>warning</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--b-flat checkbox-slider-warning">
                            <label>
                                <input type="checkbox" checked><span>warning</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--c  checkbox-slider-warning">
                            <label>
                                <input type="checkbox" checked><span>warning</span>
                            </label>
                        </div>
                        <div class="checkbox checkbox-slider-lg checkbox-slider--c-weight  checkbox-slider-warning">
                            <label>
                                <input type="checkbox" checked><span>warning</span>
                            </label>
                        </div>

                    </div>



                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Masked inputs</span>
                </div>
                <div class="panel-body">
                    <div class="note note-info">More info and examples at <a href="http://digitalbush.com/projects/masked-input-plugin/" target="_blank">http://digitalbush.com/projects/masked-input-plugin/</a></div>

                    <input type="text" placeholder="Date: 99/99/9999" class="form-control form-group-margin" id="masked-inputs-examples-date">
                    <input type="text" placeholder="SSN: 999-99-9999" class="form-control form-group-margin" id="masked-inputs-examples-ssn">
                    <input type="text" placeholder="Phone: (999) 999-9999" class="form-control form-group-margin" id="masked-inputs-examples-phone">
                    <input type="text" placeholder="Product Key: a*-999-a999" class="form-control" id="masked-inputs-examples-product-key">
                </div>
            </div>

        </div>

    </div>

</div>


@endsection


@section( 'footer-script' )
<script type="text/javascript">

    $(document).ready(function () {

        $("#masked-inputs-examples-date").mask("99/99/9999");
        $("#masked-inputs-examples-phone").mask("(999) 999-9999");
        $("#masked-inputs-examples-ssn").mask("999-99-9999");
        $("#masked-inputs-examples-product-key").mask("a*-999-a999", {
            placeholder: " ",
            completed: function () {
                alert("You typed the following: " + this.val());
            }
        });
    });
</script>

@endsection

