@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">
    <div class="page-header">
        <h3>DEFAULT</h3>
    </div>
    <p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.</p>
    <p>Pellentesque lacinia sagittis libero et feugiat. Etiam volutpat adipiscing tortor non luctus. Vivamus venenatis vitae metus et aliquet. Praesent vitae justo purus. In hendrerit lorem nisl, ac lacinia urna aliquet non. Quisque nisi tellus, rhoncus quis est sit amet, lacinia euismod nunc. Aenean nec nibh velit. Fusce quis ante in nisl molestie fringilla. Nunc vitae ante id magna feugiat condimentum. Maecenas sit amet urna massa.</p>
    <p>Integer eu lectus sollicitudin, hendrerit est ac, sollicitudin nisl. Quisque viverra sodales lectus nec ultrices. Fusce elit dolor, dignissim a nunc id, varius suscipit turpis. Cras porttitor turpis vitae leo accumsan molestie. Morbi vitae luctus leo. Sed nec scelerisque magna, et adipiscing est. Proin lobortis lectus eu sem ullamcorper, commodo malesuada quam fringilla. Curabitur ac nunc dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sagittis enim eu est lacinia, ut egestas ligula imperdiet.</p>

    <div class="page-header">
        <h3>HEADINGS</h3>
    </div>
    <h1>This is a Heading 1</h1>
    <p>Suspendisse vel quam malesuada, aliquet sem sit amet, fringilla elit. Morbi tempor tincidunt tempor. Etiam id turpis viverra, vulputate sapien nec, varius sem. Curabitur ullamcorper fringilla eleifend. In ut eros hendrerit est consequat posuere et at velit.</p>

    <div class="clearfix"></div>

    <h2>This is a Heading 2</h2>
    <p>In nec rhoncus eros. Vestibulum eu mattis nisl. Quisque viverra viverra magna nec pulvinar. Maecenas pellentesque porta augue, consectetur facilisis diam porttitor sed. Suspendisse tempor est sodales augue rutrum tincidunt. Quisque a malesuada purus.</p>

    <div class="clearfix"></div>

    <h3>This is a Heading 3</h3>
    <p>Vestibulum auctor tincidunt semper. Phasellus ut vulputate lacus. Suspendisse ultricies mi eros, sit amet tempor nulla varius sed. Proin nisl nisi, feugiat quis bibendum vitae, dapibus in tellus.</p>

    <div class="clearfix"></div>

    <h4>This is a Heading 4</h4>
    <p>Nulla et mattis nunc. Curabitur scelerisque commodo condimentum. Mauris blandit, velit a consectetur egestas, diam arcu fermentum justo, eget ultrices arcu eros vel erat.</p>

    <div class="clearfix"></div>

    <h5>This is a Heading 5</h5>
    <p>Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet. Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio. Vivamus pretium nec odio cursus elementum. Suspendisse molestie ullamcorper ornare.</p>

    <div class="clearfix"></div>

    <h6>This is a Heading 6</h6>
    <p>Donec ultricies, lacus id tempor condimentum, orci leo faucibus sem, a molestie libero lectus ac justo. ultricies mi eros, sit amet tempor nulla varius sed. Proin nisl nisi, feugiat quis bibendum vitae, dapibus in tellus.</p>



    <div class="page-header">
        <h3>INLINES</h3>
    </div>
    <div class="row">
        <div class="col-sm-4 ">
            <p class="f-700 m-b-5">Marked text</p>
            <p>For highlighting a run of text due to its relevance in another context, use the 'mark' tag.</p>
            <mark>This is marked text</mark>
        </div>

        <div class="col-sm-4 ">
            <p class="f-700 m-b-5">Deleted Text</p>
            <p>For indicating blocks of text that have been deleted use the 'del' tag.</p>
            <del>This is Deleted Text</del>
        </div>

        <div class="col-sm-4 ">
            <p class="f-700 m-b-5">Strikethrough text</p>
            <p>For indicating blocks of text that are no longer relevant use the 's' tag.</p>
            <s>This is Deleted Text</s>
        </div>

        <div class="col-sm-4 ">
            <p class="f-700 m-b-5">Inserted Text</p>
            <p>For indicating additions to the document use the 'ins' tag.</p>
            <ins>This is Inserted Text</ins>
        </div>

        <div class="col-sm-4 ">
            <p class="f-700 m-b-5">Underlined Text</p>
            <p>To underline text use the 'u' tag.</p>
            <u>This is Underlined Text</u>
        </div>

        <div class="col-sm-4 ">
            <p class="f-700 m-b-5">Small Text</p>
            <p>For de-emphasizing inline or blocks of text, use the 'small' tag.</p>
            <small>This is Small Text</small>
        </div>

        <div class="col-sm-4">
            <p class="f-700 m-b-5">Bold Text</p>
            <p>For emphasizing a snippet of text with a heavier font-weight.</p>
            <strong>This is Bold Text</strong>
        </div>

        <div class="col-sm-4">
            <p class="f-700 m-b-5">Underline Text</p>
            <p>For emphasizing a snippet of text with italics.</p>
            <em>This is Underline Text</em>
        </div>
    </div>



    <div class="page-header">
        <h3>HELPERS</h3>
    </div>
    <p class="f-700 m-b-5">Alignment Classes</p>
    <p>Easily realign text to components with text alignment classes.</p>

    <p class="text-left">Left aligned text.</p>
    <p class="text-center">Center aligned text.</p>
    <p class="text-right">Right aligned text.</p>
    <p class="text-justify">Justified text.</p>
    <p class="text-nowrap">No wrap text.</p>



    <div class="page-header">
        <h3>Abbreviations</h3>
    </div>

    <p class="f-700 m-t-5">Transformation classes</p>
    <p>Transform text in components with text capitalization classes.</p>

    <p class="text-lowercase">Lowercased text.</p>
    <p class="text-uppercase">Uppercased text.</p>
    <p class="text-capitalize">Capitalized text.</p>

    <p>Stylized implementation of HTML's 'abbr' element for abbreviations and acronyms to show the expanded version on hover. Abbreviations with a 'title' attribute have a light dotted bottom border and a help cursor on hover, providing additional context on hover and to users of assistive technologies.</p>

    <p class="m-t-20 f-700 m-b-5">Basic abbreviation</p>
    <p>An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>

    <p class="m-t-20 f-700 m-b-5">Initialism</p>
    <p>Add <abbr title="Initialism" class="initialism">Initialism</abbr> to an abbreviation for a slightly smaller font-size.</p>


    <div class="page-header">
        <h3>Blockquotes</h3>
    </div>
    <p class="">For quoting blocks of content from another source within your document.</p>

    <blockquote class="">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    </blockquote>

    <blockquote class="">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>

    <blockquote class="blockquote-reverse ">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>




    <div class="page-header">
        <h3>Unordered</h3>
    </div>

    <div class="row">



            <div class="col-md-4">
            <p>Unordered</p>

            <ul>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                <li>Facilisis in pretium nisl aliquet</li>
                <li>Nulla volutpat aliquam velit
                    <ul>
                        <li>Phasellus iaculis neque</li>
                        <li>Purus sodales ultricies</li>
                        <li>Vestibulum laoreet porttitor sem</li>
                        <li>Ac tristique libero volutpat at</li>
                    </ul>
                </li>
                <li>Faucibus porta lacus fringilla vel</li>
                <li>Aenean sit amet erat nunc</li>
                <li>Eget porttitor lorem</li>
            </ul>
            </div>

            <div class="col-md-4">
            <p>Ordered</p>
            <ol>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                <li>Facilisis in pretium nisl aliquet</li>
                <li>Nulla volutpat aliquam velit</li>
                <li>Faucibus porta lacus fringilla vel</li>
                <li>Aenean sit amet erat nunc</li>
                <li>Eget porttitor lorem</li>
                <li>Integer molestie lorem at massa</li>
                <li>Faucibus porta lacus fringilla vel</li>
                <li>Spretium nisl aliquet lorem ipsum</li>
                <li>Linking best ttoth bellorem</li>
            </ol>
            </div>

            <div class="col-md-4">
            <p>Ordered - Roman</p>
            <ol type="i">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                <li>Facilisis in pretium nisl aliquet</li>
                <li>Nulla volutpat aliquam velit</li>
                <li>Phasellus iaculis neque</li>
                <li>Purus sodales ultricies</li>
                <li>Vestibulum laoreet porttitor sem</li>
                <li>Ac tristique libero volutpat at</li>
                <li>Faucibus porta lacus fringilla vel</li>
                <li>Aenean sit amet erat nunc</li>
                <li>Eget porttitor lorem</li>
            </ol>
            </div>


    </div>

    <div class="page-header">
        <h3>Code</h3>
    </div>
        <pre><code>
        # The Greeter class
        class Greeter
          def initialize(name)
            @name = name.capitalize
          end

          def salute
            puts &quot;Hello #{@name}!&quot;
          end
        end

        g = Greeter.new(&quot;world&quot;)
        g.salute
        </code></pre>



</div>
@endsection
