$(document).ready(function()
{
    if(browseType == 'bysearch') ajaxGetSearchForm();
    if($('#bugList thead th.w-title').width() < 150) $('#bugList thead th.w-title').width(150);

    if(flow == 'onlyTest')
    {
        $('#modulemenu > .nav').append($('#featurebar > .submenu').html());
        toggleSearch();

        $(".export").modalTrigger({width:650, type:'iframe'});

        $('#modulemenu > .nav > li').removeClass('active');
        $('#modulemenu > .nav > li[data-id=' + browseType + ']').addClass('active');

        var navWidth = $('#modulemenu > .nav').width();
        var leftWidth  = 0;
        var rightWidth = 0;

        $rightNav = $('#modulemenu > .nav > li.right');
        rightLength = $rightNav.length;
        for(i = 0; i < rightLength; i++) rightWidth += $rightNav.eq(i).width();

        var maxWidth = navWidth - $('#modulemenu > .nav > #bysearchTab').width() - rightWidth - 100;

        $('#modulemenu > .nav > li:not(.right)').each(function()
        {
            if(leftWidth > maxWidth)
            {
                if($(this).attr('id') != 'moreMenus' && $(this).attr('id') != 'bysearchTab')
                {
                    $('#moreMenus').removeClass('hidden');
                    $('#moreMenus > ul').append($(this)[0]);
                }
            }
            else
            {
                leftWidth += $(this).width();
            }
        })
    }
});

function setQueryBar(queryID, title)
{
    $('#bysearchTab').before("<li id='QUERY" + queryID + "Tab' class='active'><a href='" + createLink('bug', 'browse', "productID=" + productID + "&branch=" + branch + "&browseType=bysearch&param=" + queryID) + "'>" + title + "</a></li>");
}
