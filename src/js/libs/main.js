(function ($) {
    var cookie_name = "mattering_donate_action";
    var cookie_name_skip_count = "mattering_donate_skip_count";
  
    var colorbox = function(selector) {
      var donated = ($.cookie(cookie_name) == "donate");
      var repeatedly_skipped = ($.cookie(cookie_name_skip_count) > 1); // skipped more than once
  
      $(selector).each(function() {
        if ($(this).hasClass('donate') && (donated || repeatedly_skipped)) {
          // if this is a donate popup, and the user has either donated or
          // has repeatedly skipped in the last day, then don't show the popup
          return;
        }
  
        var attr = {}
        $.each($(this).data(), function(k,v) {
          if (k.indexOf('colorbox')===0) {
            // uncamelcase
            var n = k.replace(/([A-Z])/g, '-$1' ).toLowerCase().replace(/^-/, '');
            attr[n.replace('colorbox-', '')] = v;
          }
        });
  
        $(this).colorbox(attr);
      });
    }
    
    var donations = function(selector) {
      function displayVals(where) {
        var t3 = $('#t3', where).val();
        var amount = $('#amount', where).val();
        var radioVal = $('input[name=amount]:checked', where).val();
  
        if(t3 != 0){
          if( !amount ) {
            $('#a3', where).val(radioVal);
          }else{
            $('#a3', where).val(amount);
          }
          $('#p3', where).val(1);
          $('#cmd', where).val('_xclick-subscriptions');
          $('#item_name', where).val('Recurring donation to Mattering Press');
          $('#ppinfo', where).replaceWith('<small id="ppinfo">Requires a PayPal Account</small>');
        }else{
          $('#a3', where).val(0);
          $('#p3', where).val(0);
          $('#cmd', where).val('_donations');
          $('#item_name', where).val('Donation to Mattering Press');
          $('#ppinfo', where).replaceWith('<small id="ppinfo">Does Not Require a PayPal Account</small>');
        }
        if( !t3 ) {
          $('#cmd', where).val('_donations');
          $('#item_name', where).val('Donation to Mattering Press');
          $('#ppinfo', where).replaceWith('<small id="ppinfo">Does Not Require a PayPal Account</small>');
        }
      }
  
      $("input[name=amount]", selector).change(function() { displayVals(selector); });
      $("#amount", selector).change(function() { displayVals(selector); });
      $("#t3", selector).change(function() { displayVals(selector); });
  
      $("[data-colorbox-href=#donate-popup]").on('click', function() {
        // populate the 'skip' link with the link to the actual file
        var link = $(this).attr('href');
        $('a#skip', selector).attr('href', link).one('click', function() { $("#cboxClose:visible").trigger('click'); });
  
        // make sure that we end up on a sane page once/if we return from paypal
        var paypal_return = $('input[name=return]', selector);
        paypal_return.attr('value', paypal_return.data('base-return') + "?continue=" + encodeURIComponent(link));
  
        $('input[name=cancel_return]', selector).attr('value', window.location);
      });
  
      $("button, input, a", ".donation-popup-footer").bind('click', function() {
        var action = $(this).data('action');
  
        if (action=='skip') {
          var count = $.cookie(cookie_name_skip_count) || 0;
  
          $.cookie(cookie_name, action, { expires: 1 /* day */ });
          $.cookie(cookie_name_skip_count, 1 + parseInt(count), { expires: 1 /* day */ });
        } else {
          // user donated - don't show popup again for a long time
          $.cookie(cookie_name, action, { expires: 180 /* day */ });
        }
      });
  
      displayVals(selector);
    };
  
    var downloadTracking = function() {
        var filetypes = /\.(pdf|mobi|epub)$/i;
        var baseHref = '';
        if ($('base').attr('href') != undefined) {
          baseHref = $('base').attr('href');
        }
        $('a').each(function() {
          var href = $(this).attr('href');
          if (href && href.match(filetypes) && (href.match(document.domain) || href[0]=='/')) {
            $(this).on('click', function() {
              var extension = (/[.]/.exec(href)) ? /[^.]+$/.exec(href) : undefined;
              var filePath = href;
              ga('send','event','Download','Click-'+extension,{'page': filePath}, {'nonInteraction': 1});
              _paq.push(['trackEvent', 'Download Book', filePath]);
              if ($(this).attr('target') != undefined && $(this).attr('target').toLowerCase() != '_blank') {
                setTimeout(function() {
                  location.href = baseHref + href;
                }, 200);
                return false;
              }
            });
          }
        });
    };
  
    colorbox('.colorbox');
    donations('#donate-popup');
    downloadTracking();
  })(jQuery);