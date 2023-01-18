jQuery(function ($) {
    function maskPhone(selector) {
    
        const MaskBehavior = function (val) {
            return val.replace(/\D/g, '').length > 10 ? '(00) 00000-0000' : '(00) 0000-0000';
        }
    
        const maskOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(MaskBehavior.apply({}, arguments), options);
            }
        };
    
        jQuery(selector).mask(MaskBehavior, maskOptions);
    }
    
    maskPhone('input[id="phone"]')

});
