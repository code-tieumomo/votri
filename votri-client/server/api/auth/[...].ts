import { NuxtAuthHandler } from "#auth";
import GoogleProvider from "next-auth/providers/google";

const config = useRuntimeConfig();

export default NuxtAuthHandler({
  pages: {
    signIn: "/login"
  },
  providers: [
    // @ts-expect-error You need to use .default here for it to work during SSR. May be fixed via Vite at some point
    GoogleProvider.default({
      clientId: config.google.clientId,
      clientSecret: config.google.clientSecret
    })
  ],
  secret: config.nuxtSecret,
  callbacks: {
    jwt({ token, account }) {
      // Persist the access_token in the encrypted JWT.
      if (account) {
        token.access_token = account.access_token;
      }
      return token;
    },
    session({ session, token }) {
      // Make access token available on the client.
      session.access_token = token.access_token;
      return session;
    }
  }
});
