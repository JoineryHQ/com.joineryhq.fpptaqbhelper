(function($){
  $(window).load(function(){
    if (CRM.vars.fpptaqbhelper.contactRefCustomFieldId != undefined) {
      var selector = '#custom_' + CRM.vars.fpptaqbhelper.contactRefCustomFieldId;
      var opts = $(selector).data('select2').opts;
      opts.ajax.data=function(term){return {isFpptaqbhelperContactRef: '1', term: term}};
      $(selector).crmSelect2(opts);
    };
  });
})(cj || CRM.$ || jQuery);
