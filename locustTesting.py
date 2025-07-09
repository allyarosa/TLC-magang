from locust import HttpUser, task, between

class HelloWorldUser(HttpUser):
    wait_time = between(1, 3)  # Wait time between tasks (1 to 3 seconds)

    @task
    def hello_world(self):
        self.client.get("http://localhost:8000/hello")
        self.client.get("http://localhost:8000/world")
