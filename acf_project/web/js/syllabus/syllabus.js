/**
 * Created by Timmy on 08/10/2017.
 */
$(document).ready(function ()
{
    addEventListener()
});

function addEventListener ()
{
    // add filter button event listeners
    jQuery('.filter-button').unbind('click').bind('click', function ()
    {
        var buttonElm = jQuery(this);
        // check if it is active or not
        if (buttonElm.hasClass('active-filter'))
        {
            // Remove active class and de-focus
            buttonElm.removeClass('active-filter');
            this.blur();

            // Trigger Filter
            triggerFilter();
        }
        else
        {
            // Add active class and de-focus
            buttonElm.addClass('active-filter');
            this.blur();

            // Trigger Filter
            triggerFilter();
        }
    });
}

function getActiveStarLevels ()
{
    var levelsArray = [];
    // Get all active filter buttons
    jQuery('.active-filter').each(function ()
    {
        var starLevel = jQuery(this).text();

        levelsArray.push(starLevel.trim());
    });

    return levelsArray;
}

function triggerFilter ()
{
    // Get active star levels
    var activeLevels = getActiveStarLevels();

    // Hide all rows (only if there is any active levels)
    if (activeLevels.length)
    {
        $(".syllabus-table tr:not(:first)").hide();

        // Show all that match an active filter
        for (var i = 0; i < activeLevels.length; i++)
        {
            console.log("tr td:not(:contains('" + activeLevels[i] + "'))");
            $("td:contains('" + activeLevels[i] + "')").each(function ()
            {
                jQuery(this).closest('tr').show();
            });
        }
    }
    else
    {
        $(".syllabus-table tr:not(:first)").show();
    }
}