<!DOCTYPE html>
<html>

<head>
    <!-- Font Awesome -->
    <link href="public/css/styles.css" rel="stylesheet" />
    <link href="public/css/main.css" rel="stylesheet" />
    <link href="../public/css/profile.css" rel="stylesheet" />

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <title>

    </title>
</head>

<body>

    <div class="pagination">
    </div>

    <div id="jar" style="display:none">
        <div class="content">
            <div class="card"> asdsaddsds22</div>
        </div>
        <div class="content">
            <div class="card"> asdsad</div>
        </div>
        <div class="content">3) Pellentesque sagittis risus ac ante ultricies, ac convallis urna elementum.</div>
        <div class="content">4) Vivamus sodales aliquam massa quis lobortis. </div>
        <div class="content">5) Phasellus id sem sollicitudin lacus condimentum malesuada vel tincidunt neque.</div>
        <div class="content">6) Donec magna leo, rhoncus quis nunc eu, malesuada consectetur orci.</div>
        <div class="content">7) Praesent sollicitudin, quam a ullamcorper pharetra, urna lacus mollis sem, quis semper augue massa ac est.</div>
        <div class="content">8) Etiam leo magna, fermentum quis quam non, aliquam tincidunt erat.</div>
        <div class="content">9) Morbi pellentesque nibh nec nibh posuere, vel tempor magna dignissim.</div>
        <div class="content">10) In maximus fermentum elementum. Vestibulum ac lectus pretium, suscipit ante nec, bibendum erat.</div>
        <div class="content">11) Phasellus sit amet orci at lectus fermentum congue. Etiam faucibus scelerisque purus.</div>
        <div class="content">12) Pellentesque laoreet ipsum ac laoreet consectetur. </div>
        <div class="content">13) Integer aliquet odio magna, lobortis mattis tortor suscipit sed.</div>
        <div class="content">14) Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </div>
        <div class="content">15) Mauris a tellus luctus turpis elementum imperdiet vitae malesuada mauris. </div>
        <div class="content">16) Donec id libero sagittis, laoreet lorem vel, tempus nunc. </div>
        <div class="content">17) Donec vitae neque sed ex tristique hendrerit.</div>
        <div class="content">18) Aliquam sollicitudin gravida varius.</div>
        <div class="content">19) Donec auctor, augue sed finibus fermentum, neque erat interdum libero, eget porta metus lectus quis odio.</div>
        <div class="content">20) Nunc quis ante enim. Etiam nisl orci, hendrerit ut pretium nec, tempor in metus.</div>


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="public/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="public/js/main.js"></script>
    <script>
        // Returns an array of maxLength (or less) page numbers
        // where a 0 in the returned array denotes a gap in the series.
        // Parameters:
        //   totalPages:     total number of pages
        //   page:           current page
        //   maxLength:      maximum size of returned array
        function getPageList(totalPages, page, maxLength) {
            if (maxLength < 5) throw "maxLength must be at least 5";

            function range(start, end) {
                return Array.from(Array(end - start + 1), (_, i) => i + start);
            }

            var sideWidth = maxLength < 9 ? 1 : 2;
            var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
            var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
            if (totalPages <= maxLength) {
                // no breaks in list
                return range(1, totalPages);
            }
            if (page <= maxLength - sideWidth - 1 - rightWidth) {
                // no break on left of page
                return range(1, maxLength - sideWidth - 1)
                    .concat(0, range(totalPages - sideWidth + 1, totalPages));
            }
            if (page >= totalPages - sideWidth - 1 - rightWidth) {
                // no break on right of page
                return range(1, sideWidth)
                    .concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
            }
            // Breaks on both sides
            return range(1, sideWidth)
                .concat(0, range(page - leftWidth, page + rightWidth),
                    0, range(totalPages - sideWidth + 1, totalPages));
        }

        // Below is an example use of the above function.
        $(function() {
            // Number of items and limits the number of items per page
            var numberOfItems = $("#jar .content").length;
            var limitPerPage = 4;
            // Total pages rounded upwards
            var totalPages = Math.ceil(numberOfItems / limitPerPage);
            // Number of buttons at the top, not counting prev/next,
            // but including the dotted buttons.
            // Must be at least 5:
            var paginationSize = 7;
            var currentPage;

            function showPage(whichPage) {
                if (whichPage < 1 || whichPage > totalPages) return false;
                currentPage = whichPage;
                $("#jar .content").hide()
                    .slice((currentPage - 1) * limitPerPage,
                        currentPage * limitPerPage).show();
                // Replace the navigation items (not prev/next):            
                $(".pagination li").slice(1, -1).remove();
                getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                    $("<li>").addClass("page-item")
                        .addClass(item ? "current-page" : "disabled")
                        .toggleClass("active", item === currentPage).append(
                            $("<a>").addClass("page-link").attr({
                                href: "javascript:void(0)"
                            }).text(item || "...")
                        ).insertBefore("#next-page");
                });
                // Disable prev/next when at first/last page:
                $("#previous-page").toggleClass("disabled", currentPage === 1);
                $("#next-page").toggleClass("disabled", currentPage === totalPages);
                return true;
            }

            // Include the prev/next buttons:
            $(".pagination").append(
                $("<li>").addClass("page-item").attr({
                    id: "previous-page"
                }).append(
                    $("<a>").addClass("page-link").attr({
                        href: "javascript:void(0)"
                    }).text("Prev")
                ),
                $("<li>").addClass("page-item").attr({
                    id: "next-page"
                }).append(
                    $("<a>").addClass("page-link").attr({
                        href: "javascript:void(0)"
                    }).text("Next")
                )
            );
            // Show the page links
            $("#jar").show();
            showPage(1);

            // Use event delegation, as these items are recreated later    
            $(document).on("click", ".pagination li.current-page:not(.active)", function() {
                return showPage(+$(this).text());
            });
            $("#next-page").on("click", function() {
                return showPage(currentPage + 1);
            });

            $("#previous-page").on("click", function() {
                return showPage(currentPage - 1);
            });
        });
    </script>

</body>

</html>