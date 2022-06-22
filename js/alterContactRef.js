(function($){
  $(window).load(function(){
    if (CRM.vars.fpptaqbhelper.contactRefCustomFieldId != undefined) {
      var opts = $('#custom_12').data('select2').opts;
      console.log('window load opts', opts);
      opts.ajax.data=function(term){return {isFpptaqbhelperContactRef: '1', term: term}};
      $('#custom_12').crmSelect2(opts);
    };
  });
})(cj || CRM.$ || jQuery);