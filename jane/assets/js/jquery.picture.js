/*! jQuery Validation Plugin - v1.14.0 - 6/30/2015
 * http://jqueryvalidation.org/
 * Copyright (c) 2015 Jörn Zaefferer; Licensed MIT */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}
(function(a){a.extend
    (a.fn,{validate:function(b)
            {if(!this.length)return void
                (b&&b.debug&&window.console&&console.warn
                    ("Nothing selected, can't pcvalidate, returning nothing."));
                var c=a.data(this[0],"pcvalidator");
                }
                            
    }),
    a.pcvalidator=function(b,c){this.settings=a.extend(!0,{},a.pcvalidator.defaults,b),
    this.currentForm=c,this.init()},                                    
    
    a.extend(a.pcvalidator,{                                   
    prototype:{
        init:function(){
        function b(b){
            var c=a.data(this.form,"pcvalidator"),
            d="on"+b.type.replace(/^validate/,""),
            e=c.settings;
            e[d]&&!a(this).is(e.ignore)&&e[d].call(c,this,b)}
        },
    },
                        
                        
    });
});