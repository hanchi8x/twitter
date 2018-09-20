## Cách cài đặt

1.Clone source về từ github.
2.Fix file source /.env như sau

    TWITTER_CONSUMER_KEY = your_key
    TWITTER_CONSUMER_SECRET = your_secret_key
    TWITTER_ACCESS_TOKEN = your_access_token
    TWITTER_ACCESS_TOKEN_SECRET = your_access_token_secret 

your_key, your_secret_key, your_access_token, và your_access_token_secret là những giá trị của ứng dụng twitter của client.

3. Cài đặt laravel, bằng cách chạy lệnh sau

    composer install 

4. Chạy laravel, bằng lệnh sau

    laravel artisan serve

5. Test app bằng browser với đường dẫn 

    http://localhost:8000/twitterUserTimeLine

Good Luck! 
Nếu có bất kỳ thắc mắc nào xin vui lòng liên hệ, 01227772057, Gặp A Cường.