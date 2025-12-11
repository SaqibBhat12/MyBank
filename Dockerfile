FROM python:3.11-slim

WORKDIR /app

# Install Python dependencies
COPY requirements.txt .

RUN pip install --no-cache-dir -r requirements.txt

# Copy the application code
COPY . .

# Start the app (change app.py if your entrypoint is different)
CMD ["python", "app.py"]
