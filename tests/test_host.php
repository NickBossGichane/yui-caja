<?php
    $test = '';

    if (isset($_GET['test'])) {
        $test = $_GET['test'];
    }

    $caja_base = '../../google-caja';
    
    if (isset($_GET['caja_base'])) {
        $caja_base = $_GET['caja_base'];
    }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <title>YUI/Caja Host Page</title>

    <script src="<?php echo $caja_base ?>/ant-lib/com/google/caja/plugin/html-sanitizer-minified.js"></script>
    <script src="<?php echo $caja_base ?>/third_party/js/json_sans_eval/json_sans_eval.js"></script>
    <script src="<?php echo $caja_base ?>/ant-www/testbed/cajita.js"></script>
    <script src="<?php echo $caja_base ?>/ant-www/testbed/cajita-debugmode.js"></script>
    <script src="<?php echo $caja_base ?>/ant-www/testbed/unicode.js"></script>
    <script src="<?php echo $caja_base ?>/ant-www/testbed/html-emitter.js"></script>
    <script src="<?php echo $caja_base ?>/ant-www/testbed/bridal.js"></script>
    <script src="<?php echo $caja_base ?>/ant-www/testbed/domita.js"></script>
    <script src="<?php echo $caja_base ?>/ant-www/testbed/log-to-console.js"></script>

    <script>
    (function(){
      // Give the module a variable into which it can export the valija maker
      var imports = ___.copy(___.sharedImports);
      ___.getNewModuleHandler().setImports(imports);
      imports.loader = ___.freeze(
          { provide:___.func(function (v) { valijaMaker = v; }) });
    })();
    </script>

    <!-- In ant-lib/com/google/caja/plugin/ -->
    <script src="<?php echo $caja_base ?>/ant-www/testbed/valija.co.js"></script>

  </head>
  <body>
    <div id="gadget___" class="gadget___">
    <?php include("../cajoled/" . $test . "_gadget.vo..out.html"); ?>
    </div>

    <script>(function () {
      var testImports = ___.copy(___.sharedImports);
      testImports.outers = testImports;
      var testDomContainer = document.getElementById('gadget___');
      /*
      var pseudoWindowLocation = {
          href: 'http://zip.example.com:4242/pumpkin.html?q=getit#myanchor',
          hash: '#myanchor',
          host: 'zip.example.com:4242',
          hostname: 'zip.example.com',
          pathname: '/pumpkin.html',
          port: '4242',
          protocol: 'http:',
          search: '?q=getit'
      };
      */

      ___.getNewModuleHandler().setImports(testImports);

      attachDocumentStub(
           '-gadget___',
           {
             rewrite:
                 function (uri, mimeType) {
                     return uri;
                 }
           },
           testImports,
           testDomContainer,
           null);

      testImports.htmlEmitter___ = new HtmlEmitter(testDomContainer, testImports.document);

      testImports.$v = valijaMaker.CALL___(testImports.outers); 
    })();</script>

    <script src="../cajoled/utilities.vo..out.js"></script>
    <script src="../cajoled/selector.vo..out.js"></script>
    <script src="../cajoled/yuitest.vo..out.js"></script>
    <script src="../cajoled/cookie.vo..out.js"></script>
    <script src="../cajoled/profiler.vo..out.js"></script>
    <script src="../cajoled/datasource.vo..out.js"></script>

    <script src="../cajoled/<?php echo $test ?>_gadget.vo..out.js"></script>

  </body>
</html>
