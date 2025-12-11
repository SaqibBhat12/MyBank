FROM python:3.11-slim

WORKDIR /app

# Copy application code
COPY . .

# Install dependencies (only if requirements.txt exists)
RUN if [ -f requirements.txt ]; then pip install --no-cache-dir -r requirements.txt; fi

# Run your Python app (change the entrypoint if needed)
CMD ["python", "main.py"]
