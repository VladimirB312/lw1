INSERT INTO post 
    (post_id, title, subtitle, content, author_name, author_photo_url, author_photo_alt, publish_date, image_url, image_alt, sticker, featured, recent) 
VALUES
    (UUID(), 'The Road Ahead', 'The road ahead might be paved - it might not be.', '', 'Mat Vogels', './static/images/matvogels.jpg', 'Mat Vogels', '2015-09-15 00:00:00', './static/images/roadahead.jpg', 'The Road Ahead', '', 1, 0),
    (UUID(), 'From Top Down', 'Once a year, go someplace you’ve never been before.', '', 'William Wong', './static/images/william.jpg', 'William Wong', '2015-09-15 00:00:00', './static/images/fromtop.jpg', 'From Top Down', 'adventure', 1, 0),
    (UUID(), 'Still Standing Tall', 'Life begins at the end of your comfort zone.', '', 'William Wong', './static/images/william.jpg', 'William Wong', '2015-09-15 00:00:00', './static/images/still.jpg', 'Still Standing Tall', '', 0, 1),
    (UUID(), 'Sunny Side Up', 'No place is ever as bad as they tell you it’s going to be.', '', 'Mat Vogels', './static/images/matvogels.jpg', 'Mat Vogels', '2015-09-15 00:00:00', './static/images/sunny.jpg', 'Sunny Side Up', '', 0, 1),
    (UUID(), 'Water Falls', 'We travel not to escape life, but for life not to escape us.', '', 'Mat Vogels', './static/images/matvogels.jpg', 'Mat Vogels', '2015-09-15 00:00:00', './static/images/water.jpg', 'Water Falls', '', 0, 1),
    (UUID(), 'Through the Mist', 'Travel makes you see what a tiny place you occupy in the world.', '', 'William Wong', './static/images/william.jpg', 'William Wong', '2015-09-15 00:00:00', './static/images/through.jpg', 'Through the Mist', '', 0, 1),
    (UUID(), 'Awaken Early', 'Not all those who wander are lost.', '', 'Mat Vogels', './static/images/matvogels.jpg', 'Mat Vogels', '2015-09-15 00:00:00', './static/images/awaken.jpg', 'Awaken Early', '', 0, 1),
    (UUID(), 'Try it Always', 'The world is a book, and those who do not travel read only one page.', '', 'Mat Vogels', './static/images/matvogels.jpg', 'Mat Vogels', '2015-09-15 00:00:00', './static/images/tryit.jpg', 'Try it Always', '', 0, 1);