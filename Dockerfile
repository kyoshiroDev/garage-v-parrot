# Utiliser l'image de base Node.js
FROM node:22-alpine

# Définir le répertoire de travail
WORKDIR /app

# Copier seulement package.json et package-lock.json pour installer les dépendances
COPY package*.json ./

# Installer les dépendances
RUN npm install

# Copier le reste de l'application
COPY . .

# Build l'application
# RUN npm run build

# Exposer le port sur lequel Next.js va écouter
EXPOSE 3000

# Commande pour démarrer l'application
CMD ["npm", "start"]
