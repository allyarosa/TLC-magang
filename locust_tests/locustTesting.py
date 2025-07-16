from locust import HttpUser, task, between

class HelloWorldUser(HttpUser):
    wait_time = between(1, 3)  # Wait time between tasks (1 to 3 seconds)

    @task
    def hello_world(self):
        # self.client.get("http://localhost:8000/")
        # self.client.get("http://localhost:8000/login")
        # self.client.get("http://localhost:8000/register")
        # self.client.get("http://localhost:8000/asesi/sertifikasi/level/a/1/show")
        # self.client.get("http://localhost:8000/asesi/sertifikasi/level/a/instruction")
        self.client.post("http://localhost:8000/api/asesi/payments/notification")
        
