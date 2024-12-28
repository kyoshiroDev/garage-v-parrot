# Étape 1 : Construire l'application
FROM node:18 AS builder

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers nécessaires pour installer les dépendances
COPY package*.json ./
COPY src ./src
COPY public ./public

# Installer les dépendances et construire l'application
RUN npm install
RUN npm run build

# Étape 2 : Configurer l'image finale
FROM node:18

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers nécessaires depuis l'étape de construction
COPY --from=builder /app/.next ./.next
COPY --from=builder /app/public ./public
COPY package*.json ./

# Installer uniquement les dépendances de production
RUN npm install --only=production

# Exposer le port utilisé par Next.js
EXPOSE 3000

# Lancer l'application
CMD ["npm", "run", "start"]
