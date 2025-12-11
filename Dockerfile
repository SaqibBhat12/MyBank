# MyBankApp/Dockerfile (static website)
FROM nginx:stable-alpine
WORKDIR /usr/share/nginx/html

# Remove default nginx content and copy your app
RUN rm -rf ./*
COPY . .

# Expose port (optional for local runs)
EXPOSE 80

# nginx default CMD is fine; nothing more needed
