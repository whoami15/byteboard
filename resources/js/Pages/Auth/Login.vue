<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <LayoutGuest>
    <Head title="Log in" />

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <Link href="/">
        <ApplicationLogo class="mx-auto h-10 w-auto" />
      </Link>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
      <div
        class="border-0 border-gray-200 bg-zinc-50 px-6 sm:rounded-sm sm:border sm:bg-white sm:px-8 sm:py-12 sm:shadow-sm"
      >
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
          {{ status }}
        </div>

        <form class="space-y-6" @submit.prevent="submit">
          <div>
            <InputLabel for="email" class="font-medium" value="Email" />

            <div class="mt-2">
              <TextInput
                id="email"
                v-model="form.email"
                type="email"
                placeholder="you@example.com"
                required
                autofocus
                autocomplete="username"
              />
            </div>

            <InputError class="mt-2" :message="form.errors.email" />
          </div>

          <div class="mt-4">
            <InputLabel for="password" class="font-medium" value="Password" />

            <div class="mt-2">
              <TextInput
                id="password"
                v-model="form.password"
                type="password"
                required
                autocomplete="current-password"
              />
            </div>

            <InputError class="mt-2" :message="form.errors.password" />
          </div>

          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <Checkbox
                id="remember-me"
                v-model:checked="form.remember"
                name="remember"
              />

              <InputLabel for="remember-me" class="ml-3" value="Remember me" />
            </div>

            <div class="text-sm leading-6">
              <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="font-semibold text-blue-600 hover:text-blue-500"
              >
                Forgot password?
              </Link>
            </div>
          </div>

          <div>
            <button
              type="submit"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
              class="flex w-full justify-center rounded-sm bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
            >
              Sign in
            </button>
          </div>
        </form>

        <div>
          <div class="relative mt-6">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
              <div class="w-full border-t border-gray-200" />
            </div>

            <div
              class="relative flex justify-center text-sm font-medium leading-6"
            >
              <span class="bg-white px-6 text-gray-900">or</span>
            </div>
          </div>

          <div class="mt-6 grid grid-cols-2 gap-4">
            <a
              href="#"
              class="flex w-full items-center justify-center gap-3 rounded-sm border border-gray-300 bg-white px-3 py-1.5 text-gray-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300"
            >
              <svg
                class="h-5 w-5"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill="#4285F4"
                  d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18Z"
                ></path>

                <path
                  fill="#34A853"
                  d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17Z"
                ></path>

                <path
                  fill="#FBBC05"
                  d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07Z"
                ></path>

                <path
                  fill="#EA4335"
                  d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3Z"
                ></path>
              </svg>

              <span class="text-sm font-semibold leading-6">Google</span>
            </a>

            <a
              href="#"
              class="flex w-full items-center justify-center gap-3 rounded-sm bg-[#24292F] px-3 py-1.5 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#24292F]"
            >
              <svg
                class="h-5 w-5"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                  clip-rule="evenodd"
                />
              </svg>

              <span class="text-sm font-semibold leading-6">GitHub</span>
            </a>
          </div>
        </div>
      </div>

      <p class="mt-10 text-center text-sm text-gray-500">
        Not a member?
        {{ " " }}
        <Link
          :href="route('register')"
          class="font-semibold leading-6 text-blue-600 hover:text-blue-500"
        >
          Create an account
        </Link>
      </p>
    </div>
  </LayoutGuest>
</template>
