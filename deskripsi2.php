if ($fotoID) {
                        // Query to get photo details
                        $query = "SELECT JudulFoto, DeskripsiFoto, LokasiFoto FROM foto WHERE FotoID = '$fotoID'";
                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $photo = mysqli_fetch_assoc($result);
                            // Display photo details
                            echo "<div class='photo-detail'>";
                            echo "<h2 class='text-center'>{$photo['JudulFoto']}</h2>";
                            echo "<img src='uploads/{$photo['LokasiFoto']}' class='img-fluid mb-3' alt='Photo'>";
                            echo "<p>{$photo['DeskripsiFoto']}</p>";
                            echo "</div>";

                            // Query to get comments
                            $commentsQuery = "SELECT k.IsiKomentar, u.Username, k.TanggalKomentar 
                                              FROM komentarfoto k 
                                              JOIN user u ON k.UserID = u.UserID 
                                              WHERE k.FotoID = '$fotoID' 
                                              ORDER BY k.TanggalKomentar DESC";
                            $commentsResult = mysqli_query($con, $commentsQuery);

                            if (mysqli_num_rows($commentsResult) > 0) {
                                echo "<div class='comments-section'>";
                                while ($comment = mysqli_fetch_assoc($commentsResult)) {
                                    echo "<div class='comment'>";
                                    echo "<strong>{$comment['Username']}:</strong> <br>";
                                    echo "{$comment['IsiKomentar']}";
                                    echo "<p><small>Posted on: {$comment['TanggalKomentar']}</small></p>";
                                    echo "</div><hr>";
                                }
                                echo "</div>";
                            } else {
                                echo "<p>No comments yet.</p>";
                            }
                        } else {
                            echo "<p>Photo not found.</p>";
                        }
                    }