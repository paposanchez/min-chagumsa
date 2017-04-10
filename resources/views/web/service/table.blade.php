@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">

    <div class="page-header">
        <h3>DEFAULT</h3>
    </div>
    <table class="table">
        <thead>
            <tr class="active">
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Nickname</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Alexandra</td>
                <td>Christopher</td>
                <td>@makinton</td>
                <td>Ducky</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Madeleine</td>
                <td>Hollaway</td>
                <td>@hollway</td>
                <td>Cheese</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sebastian</td>
                <td>Johnston</td>
                <td>@sebastian</td>
                <td>Jaycee</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mitchell</td>
                <td>Christin</td>
                <td>@mitchell4u</td>
                <td>AdskiDeAnus</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Elizabeth</td>
                <td>Belkitt</td>
                <td>@belkitt</td>
                <td>Goat</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Benjamin</td>
                <td>Parnell</td>
                <td>@wayne234</td>
                <td>Pokie</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Katherine</td>
                <td>Buckland</td>
                <td>@anitabelle</td>
                <td>Wokie</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Nicholas</td>
                <td>Walmart</td>
                <td>@mwalmart</td>
                <td>Spike</td>
            </tr>
        </tbody>
    </table>




    <div class="page-header">
        <h3>STRIPED</h3>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Nickname</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Alexandra</td>
                <td>Christopher</td>
                <td>@makinton</td>
                <td>Ducky</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Madeleine</td>
                <td>Hollaway</td>
                <td>@hollway</td>
                <td>Cheese</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sebastian</td>
                <td>Johnston</td>
                <td>@sebastian</td>
                <td>Jaycee</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mitchell</td>
                <td>Christin</td>
                <td>@mitchell4u</td>
                <td>AdskiDeAnus</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Elizabeth</td>
                <td>Belkitt</td>
                <td>@belkitt</td>
                <td>Goat</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Benjamin</td>
                <td>Parnell</td>
                <td>@wayne234</td>
                <td>Pokie</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Katherine</td>
                <td>Buckland</td>
                <td>@anitabelle</td>
                <td>Wokie</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Nicholas</td>
                <td>Walmart</td>
                <td>@mwalmart</td>
                <td>Spike</td>
            </tr>
        </tbody>
    </table>


    <div class="page-header">
        <h3>BORDERED</h3>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr class="active">
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Nickname</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Alexandra</td>
                <td>Christopher</td>
                <td>@makinton</td>
                <td>Ducky</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Madeleine</td>
                <td>Hollaway</td>
                <td>@hollway</td>
                <td>Cheese</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sebastian</td>
                <td>Johnston</td>
                <td>@sebastian</td>
                <td>Jaycee</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mitchell</td>
                <td>Christin</td>
                <td>@mitchell4u</td>
                <td>AdskiDeAnus</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Elizabeth</td>
                <td>Belkitt</td>
                <td>@belkitt</td>
                <td>Goat</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Benjamin</td>
                <td>Parnell</td>
                <td>@wayne234</td>
                <td>Pokie</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Katherine</td>
                <td>Buckland</td>
                <td>@anitabelle</td>
                <td>Wokie</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Nicholas</td>
                <td>Walmart</td>
                <td>@mwalmart</td>
                <td>Spike</td>
            </tr>
        </tbody>
    </table>


    <div class="page-header">
        <h3>HOVER</h3>
    </div>
    <table class="table table-hover">
        <thead>
             <tr class="active">
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Nickname</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Alexandra</td>
                <td>Christopher</td>
                <td>@makinton</td>
                <td>Ducky</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Madeleine</td>
                <td>Hollaway</td>
                <td>@hollway</td>
                <td>Cheese</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sebastian</td>
                <td>Johnston</td>
                <td>@sebastian</td>
                <td>Jaycee</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mitchell</td>
                <td>Christin</td>
                <td>@mitchell4u</td>
                <td>AdskiDeAnus</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Elizabeth</td>
                <td>Belkitt</td>
                <td>@belkitt</td>
                <td>Goat</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Benjamin</td>
                <td>Parnell</td>
                <td>@wayne234</td>
                <td>Pokie</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Katherine</td>
                <td>Buckland</td>
                <td>@anitabelle</td>
                <td>Wokie</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Nicholas</td>
                <td>Walmart</td>
                <td>@mwalmart</td>
                <td>Spike</td>
            </tr>
        </tbody>
    </table>

    <div class="page-header">
        <h3>CONDENSED</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-condensed">
            <thead>
                 <tr class="active">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Nickname</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Alexandra</td>
                    <td>Christopher</td>
                    <td>@makinton</td>
                    <td>Ducky</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Madeleine</td>
                    <td>Hollaway</td>
                    <td>@hollway</td>
                    <td>Cheese</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Sebastian</td>
                    <td>Johnston</td>
                    <td>@sebastian</td>
                    <td>Jaycee</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Mitchell</td>
                    <td>Christin</td>
                    <td>@mitchell4u</td>
                    <td>AdskiDeAnus</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Elizabeth</td>
                    <td>Belkitt</td>
                    <td>@belkitt</td>
                    <td>Goat</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Benjamin</td>
                    <td>Parnell</td>
                    <td>@wayne234</td>
                    <td>Pokie</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Katherine</td>
                    <td>Buckland</td>
                    <td>@anitabelle</td>
                    <td>Wokie</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Nicholas</td>
                    <td>Walmart</td>
                    <td>@mwalmart</td>
                    <td>Spike</td>
                </tr>
            </tbody>
        </table>
    </div>



    <div class="page-header">
        <h3>CONTEXTUAL</h3>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="active">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Nickname</th>
                </tr>
            </thead>
            <tbody>
                <tr class="info">
                    <td>1</td>
                    <td>Alexandra</td>
                    <td>Christopher</td>
                    <td>@makinton</td>
                    <td>Ducky</td>
                </tr>
                <tr class="warning">
                    <td>4</td>
                    <td>Mitchell</td>
                    <td>Christin</td>
                    <td>@mitchell4u</td>
                    <td>AdskiDeAnus</td>
                </tr>
                <tr class="success">
                    <td>2</td>
                    <td>Madeleine</td>
                    <td>Hollaway</td>
                    <td>@hollway</td>
                    <td>Cheese</td>
                </tr>
                <tr class="danger">
                    <td>5</td>
                    <td>Elizabeth</td>
                    <td>Belkitt</td>
                    <td>@belkitt</td>
                    <td>Goat</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
