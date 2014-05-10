<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="views/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="views/css/main.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="products_controller.php">商品一覧</a></li>
            <li class="active"><a href="sales_controller.php">売上一覧</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <h1>売上一覧</h1>

      <p>これまでに購入された商品の一覧です。</p>

      <table class="table table-bordred">
        <thead>
          <tr>
            <th>日時</th>
            <th>商品名</th>
            <th>個数</th>
            <th>合計（個数 * 単価）</th>
          </tr>
        </thead>
        <tbody>
          <?php  foreach ($model_data as $sale) { ?>
          <tr>
            <td><? echo $sale->getSalesAt();?></td>
            <td><? echo $sale->getName();?></td>
            <td><? echo $sale->getQuantity();?></td>
            <td><? echo $sale->getQuantity()*$sale->getPrice();?>円</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
  </body>
</html>