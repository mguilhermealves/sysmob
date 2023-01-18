data_relationships_json.template = '<div class="row_js#CLASS#"#ADD#>';
data_relationships_json.template += '  <div class="cell" style="min-width: 70px !important;overflow:hidden;"#ADD_IMG#">#IMG#</div>';
data_relationships_json.template += '  <div class="cell" style="min-width: 70px !important;overflow:hidden;"#ADD_PJ#">#PJ#</div>';
data_relationships_json.template += '  <div class="cell" style="height: 45px;min-width: 70px !important;overflow:hidden;"#ADD_NAME#">#NAME#</div>';
data_relationships_json.template += '  <div class="cell" style="min-width: 70px !important;overflow:hidden;"#ADD_CREATED#">#CREATED#</div>';
data_relationships_json.template += '  <div class="cell" style="min-width: 70px !important;overflow:hidden;"#ADD_UPDATE#">#UPDATE#</div>';
data_relationships_json.template += '  <div class="cell cell_last" style="min-width: 70px !important;overflow:hidden;">#ACAO#</div>';
data_relationships_json.template += '</div>';

data_relationships_json.footer = '<div class="row_js table_data_footer">';
data_relationships_json.footer += ' <div class="cell cell_last table_data_footer">';
data_relationships_json.footer += '     Linha por Página ';
data_relationships_json.footer += '     <select id="per_page">';
data_relationships_json.footer += '         <option value="20" selected>20</option>';
data_relationships_json.footer += '         <option value="50">50</option>';
data_relationships_json.footer += '         <option value="100">100</option>';
data_relationships_json.footer += '     </select>';
data_relationships_json.footer += ' </div>';
data_relationships_json.footer += ' <div class="cell cell_last table_data_footer" style="justify-content: space-around;" id="paginate_control"></div>';
data_relationships_json.footer += ' <div class="cell cell_last table_data_footer" id="paginate_display">#DATA_TOTAL#</div>';
data_relationships_json.footer += '</div>';
$("#btn_export").bind("click",function(){
    $("#frm_filter").prop({"action": $("#frm_filter").prop("action") + '.xls' });
    $("#frm_filter").submit();
    $("#frm_filter").prop({"action": String( $("#frm_filter").prop("action") ).replace(/.xls/,'') });
})
$.ajax({
    type: "GET",
    url: data_relationships_json.url
    , data: data_relationships_json.data
    ,success: function( data ){
        $.each( data.total , function(i,o){
            $( "#" + i + "SpanUser").html( o )
        })
        data_relationships_json.out_data = data ;
        fn_common.render_data( 
            data_relationships_json.template + '<div class="row_data"></div>'
            , {
                "#CLASS#" : " row_js_header"
                , "#ADD#": ""
                , "#IMG#" : '<button style="width: 100%; background-color: #ffffff; color: #707070; text-align: left; font-weight: bold; padding: 0px;" type="button">Imagem </button>'
                , "#PJ#" : '<button style="width: 100%; background-color: #ffffff; color: #707070; text-align: left; font-weight: bold; padding: 0px;" id="btn_ordenation_pj" type="button">Instituição<i class="fa fa-border-none"></i></button>'
                , "#NAME#" : '<button style="width: 100%; background-color: #ffffff; color: #707070; text-align: left; font-weight: bold; padding: 0px;" id="btn_ordenation_name" type="button">Titulo<i class="fa fa-border-none"></i></button>'
                , "#UPDATE#" : '<button style="width: 100%; background-color: #ffffff; color: #707070; text-align: left; font-weight: bold; padding: 0px;" id="btn_ordenation_modified_at" type="button">Data da Atualização<i class="fa fa-border-none"></i></button>'
                , "#CREATED#" : '<button style="width: 100%; background-color: #ffffff; color: #707070; text-align: left; font-weight: bold; padding: 0px;" id="btn_ordenation_created_at" type="button">Data da Criação<i class="fa fa-border-none"></i></button>'
                , "#ACAO#" : 'AÇÃO'
            }
            , "#solaris-head-data" 
        ) ;
        fn_common.render_data( 
            data_relationships_json.footer
            , {
                "#DATA_TOTAL#" : ""
            }
            , "#solaris-head-data" 
        ) ;
        $.each( data.row , function(i,o){
            $("#data_register_"+ o.idx).remove();
            fn_common.render_data( 
                data_relationships_json.template
                , {
                    "#CLASS#" : " table_data_data"
                    , "#ADD#": ' data-name="' + o.name + '" data-name="' + o.users_attach[0]["pjs_attach"][0]["name"] + '" data-created_at="' + o.created_at + '" data-modified_at="' + ( o.modified_at != null ? o.modified_at : o.created_at ) + '"'
                    , "#IMG#" : ''
                    , "#PJ#": o.users_attach[0]["pjs_attach"][0]["name"]
                    , "#NAME#" : o.post.title
                    , "#UPDATE#" : o.modified_at != null ? String( o.modified_at ).replace(/^(....).(..).(..).(.....).+/,"$3/$2/$1 $4" ) : String( o.created_at ).replace(/^(....).(..).(..).(.....).+/,"$3/$2/$1 $4" )
                    , "#CREATED#" : String( o.created_at ).replace(/^(....).(..).(..).(.....).+/,"$3/$2/$1 $4" )
                    , "#ACAO#" : '<a href="' + String( data_relationships_json.url_edit ).replace(/%s/,o.idx)  + '" style="width: 100%; background-color: #ffffff; color: #707070; text-align: left; font-weight: bold; padding: 0px;" id="btn_ordenation_status" type="button">Editar<i class="fa fa-edit"></i></a>'
                }
                , "#solaris-head-data .row_data" 
            ) ;
        })
        $.each(['name','pj','modified_at','created_at'], function(i,o){
            $("#btn_ordenation_" + o ).bind("click",function(){
                fn_common.ordenation( o )
            })
        });
        fn_common.paginate(1);
        $("#per_page").bind("change", function(){
            fn_common.paginate(1);
        })
    }
})


var fn_common = {
    render_data: function (template, data, destine) {
        $.each(data, function (r, p) {
            var t = new RegExp(r, "g")
            template = String(template).replace(t, p);
        })
        $(destine).append(template);
    }, 
    paginate: function( sr ){
        paginate_control_button = '<button type="button" id="btn_#ID#" class="btn">#relationship#</button>';
        per_page = $("#per_page").length > 0 ?  $("option:selected", "#per_page").val() : 20 ;
        paginate = sr * Number( per_page ) ;

        $("#paginate_control").html('') ;
        $.each({
            'first':'<i class="fa fa-angle-double-left"></i>'
            , 'previous':'<i class="fa fa-angle-left"></i>'
            , 'next':'<i class="fa fa-angle-right"></i>'
            , 'last':'<i class="fa fa-angle-double-right"></i>'
        }, function(i,o){
            fn_common.render_data( 
                paginate_control_button
                , {
                    "#relationship#" : o
                    , "#ID#": i
                }
                , "#paginate_control" 
            ) ;
        });

        if( sr == 1 ){
            $('#btn_first').prop( "disabled", true ).unbind("click");
            $('#btn_previous').prop( "disabled", true ).unbind("click");
        }
        else{
            $('#btn_first').prop( "disabled", false ).unbind("click").bind("click", function(){ 
                fn_common.paginate( 1 ) ; 
            })
            $('#btn_previous').prop( "disabled", false ).unbind("click").bind("click", function(){
                fn_common.paginate( ( sr - 1 ) ) ; 
            });
        }

        paginate_text = ( paginate - per_page + 1 ) ;

        if( paginate < data_relationships_json.out_data.total.total ){
            last_paginate = data_relationships_json.out_data.total.total % per_page == 0 ? data_relationships_json.out_data.total.total / per_page : ( Math.floor( data_relationships_json.out_data.total.total / per_page ) + 1 ) ;
            paginate_text += ' - ' + paginate;
            $('#btn_next').prop( "disabled", false ).unbind("click").bind("click", function(){ 
                fn_common.paginate( ( sr + 1 ) ) ; 
            });
            $('#btn_last').prop( "disabled", false ).unbind("click").bind("click", function(){
                fn_common.paginate( last_paginate ) ; 
            });
        }
        else{
            $('#btn_next').prop( "disabled", true ).unbind("click");
            $('#btn_last').prop( "disabled", true ).unbind("click");
        }
        paginate_text += ' de ' + data_relationships_json.out_data.total.total;
    
        $(".row_data .table_data_data").hide();
        $(".row_data .table_data_data").slice( paginate - per_page , paginate).css({"display":"flex"})
        $("#paginate_display").html( paginate_text );
    }
    , ordenation: function( obj ){
        var ordernation = $("#btn_ordenation_" + obj + " i").hasClass( "fa-angle-up" );
        $.each( $(".row_js_header button i") , function(i,o){
            $(o).removeClass("fa-border-none").removeClass("fa-angle-up").removeClass("fa-angle-down").addClass("fa-border-none")
        })
        $("#btn_ordenation_" + obj + " i").removeClass("fa-border-none").addClass( ordernation ? "fa-angle-down" : "fa-angle-up");
        $(".row_data .table_data_data").sort(function(a,b){ return ( ordernation ? ( $(b).data( obj ) ) > ( $(a).data( obj ) ) : ( $(b).data( obj ) ) < ( $(a).data( obj ) ) ) ? 1 : -1; }).appendTo(".row_data");
    }
}